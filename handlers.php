<?php

/*

  Debtor:
  CREDIT - Full amount to debtor account
  GL:
  8000000 - CREDIT full amount
  Received Meter Control DEBIT full amount



 */

    function handleIncomingFundsERP(
    $tid, $created, $serialnumber, $paymentmethod_id, $amount
    )   {
    debug_print("Entry: handlingIncomingFundsERP ( tid = $tid )");

    debug_print("Creating debtor transaction record");

    $paymentmethod = loadPaymentMethod($paymentmethod_id);
    if ($paymentmethod === false)
        return false;

    $meter = loadMeterInformation($serialnumber);
    if ($meter === false)
        return false;

    $account = loadAccount($meter['account_id']);
    if ($account === false)
        return false;

    $branch = loadCustomerBranch($account['customerbranch_id']);
    if ($branch === false)
        return false;

    $branchcode = $branch['code'];
    $new_date = date('Y-m-d', strtotime($created));
    $period_id = fgetPeriod_id($new_date, __FILE__, __LINE__);
    $reference = substr($paymentmethod['code'], 0, 7) . ' ' . $tid;
    $salesorder_id = 0;
    $gst = 0.00;
    $freight = 0.00;
    $rate = 1.00;
    $invtext = '';
    $settled = 0;
    $discount = 0;
    $invtext = 'ReceivedMeter:' . $serialnumber . '(' . $branchcode . ')';
    $invtextevent = 'Received';
    $invtextserialnumber = $serialnumber;
    $invtextbranchcode = $branchcode;
    $meter_id = $meter['meter_id'];
    $posted = 1;

    $dtid = insertDebtorTrans(
            $tid, $paymentmethod['transactiontype_id'], $account['customerbranch_id'], $created, $period_id, $reference, $salesorder_id, 
            (-($amount)), $gst, $freight, $rate, $invtext, $settled, $discount, $invtextevent, $invtextserialnumber, $invtextbranchcode, $meter_id
    );

    debug_print("Creating GL transaction records");

    $vatapplicable_id = 5;

    if (doesGlExist($paymentmethod['erpglaccountcredit']) &&
            doesGlExist($paymentmethod['erpglaccountdebit'])) {
        $rc = insertGLTrans(
                $paymentmethod['transactiontype_id'], $tid, $new_date, $period_id, $invtext, $posted, $vatapplicable_id, $postings = array(
            array($paymentmethod['erpglaccountcredit'] => -$amount),
            array($paymentmethod['erpglaccountdebit'] => $amount)
                )
        );
    }

    debug_print("Returning transaction id $tid");
    debug_print("Exit: handleIncomingFundsERP");
    return $tid;
    }

    function handleIncomingFunds(&$trans, $use_erp, $transaction_id = 0, $issynctoerpverified = 1) {
    debug_print("Entry: handlingIncomingFunds ( use_erp = " . (($use_erp) ? "yes" : "no") . ", transaction_id = $transaction_id )");

    $tid = $transaction_id;

    if ($tid <= 0) {
        $tid = singleTransactionInsert($trans);
    } else {
        updateTransaction($tid, array(
            "gst" => 0,
            "services" => 0,
            "arrears" => 0,
            "arrearsfees" => 0,
            "managementfees" => 0,
            "managementfeestax" => 0,
            "managementfeeslandlord" => 0,
            "transactionstatus_id" => 1,
            "issynctoerpverified" => $issynctoerpverified,
            "wh" => 0
        ));
    }

    tset($trans, "work.original_tid", $tid);

    if ($use_erp) {
        $rc = handleIncomingFundsERP(
                $tid, tget($trans, "work.created"), tget($trans, "work.serialnumber"), tget($trans, "work.paymentmethod_id"), tget($trans, "work.calc.amount")
        );

        if ($rc === false) {
            debug_print("Posting to ERP failed");
            return false;
        }
    }

    debug_print("Returning transaction id $tid");
    debug_print("Exit: handleIncomingFunds");
    return $tid;
    }

/*


  Debtors:
  DEBIT - Full amount to DEBTOR account
  CREDIT - Full amount to corresponding CASH SALE account
  GL:
  8000000 - DEBIT full amount
  8000000 - CREDIT full amount

  Debtors:
  DEBIT - Line to be invoiced full amount

 */

    function handleChannelFeesForTenantERP(
    $tid, $created, $serialnumber, $paymentmethod_id, $amount
    ) {
    debug_print("Entry: handleChannelFeesForTenantERP ( tid = $tid )");

    debug_print("Creating debtor transaction record");

    $paymentmethod = loadPaymentMethod($paymentmethod_id);
    if ($paymentmethod === false)
        return false;

    $meter = loadMeterInformation($serialnumber);
    if ($meter === false)
        return false;

    $account = loadAccount($meter['account_id']);
    if ($account === false)
        return false;

    $branch = loadCustomerBranch($account['customerbranch_id']);
    if ($branch === false)
        return false;

    $branchcode = $branch['code'];
    $new_date = date('Y-m-d', strtotime($created));
    $period_id = fgetPeriod_id($new_date, __FILE__, __LINE__);
    $reference = substr($paymentmethod['code'], 0, 7) . ' ' . $tid;
    $salesorder_id = 0;
    $gst = 0.00;
    $freight = 0.00;
    $rate = 1.00;
    $invtext = '';
    $settled = 0;
    $discount = 0;
    $invtext = 'ReceivedMeter:' . $serialnumber . '(' . $branchcode . ')';
    $invtextevent = 'Received';
    $invtextserialnumber = $serialnumber;
    $invtextbranchcode = $branchcode;
    $meter_id = $meter['meter_id'];
    $posted = 1;

    $dtid = insertDebtorTrans(
            $tid, $paymentmethod['transactiontype_id'], $account['customerbranch_id'], $created, $period_id, $reference, $salesorder_id, $amount, $gst, $freight, $rate, $invtext, $settled, $discount, $invtextevent, $invtextserialnumber, $invtextbranchcode, $meter_id
    );


    $dtid = insertDebtorTrans(
            $tid, $paymentmethod['transactiontype_id'], $paymentmethod['customerbranch_id'], $created, $period_id, $reference, $salesorder_id, (-$amount), $gst, $freight, $rate, $invtext, $settled, $discount, $invtextevent, $invtextserialnumber, $invtextbranchcode, $meter_id
    );

    // Line to be invoiced
    $dtid = insertDebtorTrans(
            $tid, 4, $paymentmethod['customerbranch_id'], $created, $period_id, $reference, $salesorder_id, $amount, $gst, $freight, $rate, $invtext, $settled, $discount, $invtextevent, $invtextserialnumber, $invtextbranchcode, $meter_id
    );


    debug_print("Creating GL transaction records");

    $vatapplicable_id = 5;

    if (doesGlExist($paymentmethod['erpglaccountcredit']) &&
            doesGlExist($paymentmethod['erpglaccountdebit'])) {
        $rc = insertGLTrans(
                $paymentmethod['transactiontype_id'], $tid, $new_date, $period_id, $invtext, $posted, $vatapplicable_id, $postings = array(
            array($paymentmethod['erpglaccountcredit'] => $amount),
            array($paymentmethod['erpglaccountcredit'] => -$amount)
                )
        );
    }


    debug_print("Returning transaction id $tid");
    debug_print("Exit: handleChannelFeesForTenantERP");
    return $tid;
    }

/*
  Debtor:
  DEBIT - Full amount to debtor account
  CREDIT - Corresponding cash sale account
  GL:
  8000000 - DEBIT full amount
  8000000 - CREDIT full amount
 */

    function handleChannelFeesForTenant(&$trans, $vat, $exclusive, $landlord, $use_erp) {
    debug_print("Entry: handlingChannelFeesForTenant ( vat = $vat, exclusive = $exclusive, landlord = $landlord, use_erp = " . (($use_erp) ? "yes" : "no") . " )");

    tset($trans, "work.calc.services", ($exclusive));

    tset($trans, "work.calc.vat", $vat);
    tset($trans, "work.fees.excl", $exclusive);
    tset($trans, "work.fees.tax", $vat);
    tset($trans, "work.fees.landlord", $landlord);

    tset($trans, "work.calc.amount", ($vat + $exclusive));

    debug_print("Setting paymentmethod_id: 74");
    tset($trans, "work.paymentmethod_id", 74);
    // Set up as Channel Fee Tenant

    tset($trans, "work.calc.remaining", (
            tget($trans, "work.calc.remaining") - $vat - $exclusive
            )
    );

    // Update running totals
    tadd($trans, "results.vat", $vat);
    tadd($trans, "results.exclusive", $exclusive);


    $tid = singleTransactionInsert($trans);

    setTransactionLink(tget($trans, "work.original_tid"), $tid);
    // Record heritage

    if ($use_erp) {
        $rc = handleChannelFeesForTenantERP(
                $tid, tget($trans, "work.created"), tget($trans, "work.serialnumber"), tget($trans, "work.incoming_paymentmethod_id"), tget($trans, "work.calc.amount")
        );

        if ($rc === false) {
            debug_print("Posting to ERP failed");
            return false;
        }
    }

    debug_print("Returning transaction id $tid");
    return $tid;
}

/*

  Debtors:
  DEBIT - Full amount to DEBTOR account
  CREDIT - Full amount to corresponding CASH SALE account
  GL:
  8000000 - DEBIT full amount
  8000000 - CREDIT full amount

  Debtors:
  DEBIT - Line to be invoiced full amount

 */

    function handleChannelFeesForLandlordERP(
    $tid, $created, $serialnumber, $paymentmethod_id, $amount
    ) {
    debug_print("Entry: handleChannelFeesForLandlordERP ( tid = $tid )");

    debug_print("Creating debtor transaction record");

    $paymentmethod = loadPaymentMethod($paymentmethod_id);
    if ($paymentmethod === false)
        return false;

    $meter = loadMeterInformation($serialnumber);
    if ($meter === false)
        return false;

    $account = loadAccount($meter['account_id']);
    if ($account === false)
        return false;

    $branch = loadCustomerBranch($account['customerbranch_id']);
    if ($branch === false)
        return false;

    $branchcode = $branch['code'];
    $new_date = date('Y-m-d', strtotime($created));
    $period_id = fgetPeriod_id($new_date, __FILE__, __LINE__);
    $reference = substr($paymentmethod['code'], 0, 7) . ' ' . $tid;
    $salesorder_id = 0;
    $gst = 0.00;
    $freight = 0.00;
    $rate = 1.00;
    $invtext = '';
    $settled = 0;
    $discount = 0;
    $invtext = 'ReceivedMeter:' . $serialnumber . '(' . $branchcode . ')';
    $invtextevent = 'Received';
    $invtextserialnumber = $serialnumber;
    $invtextbranchcode = $branchcode;
    $meter_id = $meter['meter_id'];
    $posted = 1;

    // Line to be invoiced
    $dtid = insertDebtorTrans(
            $tid, 4, $account['customerbranch_id'], $created, $period_id, $reference, $salesorder_id, $amount, $gst, $freight, $rate, $invtext, $settled, $discount, $invtextevent, $invtextserialnumber, $invtextbranchcode, $meter_id
    );



    debug_print("Returning transaction id $tid");
    debug_print("Exit: handleChannelFeesForLandlordERP");
    return $tid;
    }

    function handleChannelFeesForLandlord(&$trans, $vat, $exclusive, $landlord, $use_erp) {
    debug_print("Entry: handlingChannelFeesForLandlord ( vat = $vat, exclusive = $exclusive, landlord = $landlord, use_erp = " . (($use_erp) ? "yes" : "no") . " )");

    tset($trans, "work.calc.services", ($exclusive));

    tset($trans, "work.calc.vat", $vat);
    tset($trans, "work.fees.excl", $exclusive);
    tset($trans, "work.fees.tax", $vat);
    tset($trans, "work.fees.landlord", $landlord);

    tset($trans, "work.calc.amount", ($vat + $exclusive));

    debug_print("Setting paymentmethod_id: 75");
    tset($trans, "work.paymentmethod_id", 75);
    // Set up as Channel Fee Landlord
    // Landlord fees do not get taken off the wallet
    // Update running totals
    tadd($trans, "results.vat", $vat);
    tadd($trans, "results.exclusive", $exclusive);


    $tid = singleTransactionInsert($trans);

    setTransactionLink(tget($trans, "work.original_tid"), $tid);
    // Record heritage

    if ($use_erp) {
        $rc = handleChannelFeesForLandlordERP(
                $tid, tget($trans, "work.created"), tget($trans, "work.serialnumber"), tget($trans, "work.incoming_paymentmethod_id"), tget($trans, "work.calc.amount")
        );

        if ($rc === false) {
            debug_print("Posting to ERP failed");
            return false;
        }
    }

    debug_print("Returning transaction id $tid");
    return $tid;
    }

/*

  Returns an array with two integers:
  ( tenant transaction id, landlord transaction id )

 */

    function handleChannelFees(&$trans, $use_erp) {
    debug_print("Entry: handlingChannelFees ( use_erp = " . (($use_erp) ? "yes" : "no") . " )");

    $fees = loadManagementFees(
            tget($trans, 'params.amount'), tget($trans, 'work.paymentmethod_id'), tget($trans, 'work.meter.debtortype_id'), tget($trans, 'work.meter.country_id'), tget($trans, 'work.chargefee'), tget($trans, 'work.account_id'), 100, // tenantfeepercentage. Was hard coded to 100. Still is.
            tget($trans, 'work.vat_rate')
    );

    debug_print("Calculated fees: " . (debug_flatten_array($fees)));

    // According to the tenantfeepercentage, we must now split the fees
    // between the tenant and the landlord.

    $amount = tget($trans, "params.amount");
    $vat = $fees['tax'];
    $exclusive = $fees['excl'];
    $landlord = $fees['landlord'];

    $tenantPercentage = tget($trans, "work.account.tenantfeepercentage");

    // Don't waste time if we have 100 or 0
    if ($tenantPercentage == 100) {
        $tid = handleChannelFeesForTenant($trans, $vat, $exclusive, $landlord, $use_erp);
        debug_print("Returning transaction ids ( $tid, 0 )");
        return array($tid, 0);
    }

    if ($tenantPercentage == 0) {
        $tid = handleChannelFeesForLandlord($trans, $vat, $exclusive, $landlord, $use_erp);
        debug_print("Returning transaction ids ( 0, $tid )");
        return array(0, $tid);
    }

    // We have to calculate percentages

    $ttid = 0;
    $ltid = 0;

    $newVat = round((($vat * $tenantPercentage) / 100), 2);
    $newExclusive = round((($exclusive * $tenantPercentage) / 100), 2);
    $newLandlord = round((($landlord * $tenantPercentage) / 100), 2);

    // Floating point errors can be stupid sometimes
    if ($newVat < 0.01)
        $newVat = 0.0;
    if ($newExclusive < 0.01)
        $newExclusive = 0.0;
    if ($newLandlord < 0.01)
        $newLandlord = 0.0;

    // In some cases, there's no point in doing this.
    if (($newVat != 0) || ($newExclusive != 0)) {
        $ttid = handleChannelFeesForTenant(
                $trans, $newVat, $newExclusive, $landlord, $use_erp
        );

        $ltid = handleChannelFeesForLandlord(
                $trans, ($vat - $newVat), ($exclusive - $newExclusive), ($landlord - $newLandlord), $use_erp
        );
    } else {
        // In this case, there's technically all for the landlord
        $ltid = handleChannelFeesForLandlord(
                $trans, $vat, $exclusive, $landlord, $use_erp
        );
    }


    $rc = array($ttid, $ltid);

    debug_print("Returning transaction ids ( $ttid, $ltid )");
    return $rc;
}

/*

  Debtors:
  CREDIT - Full ARREARS amount to DEBTOR account
  DEBIT - Line to be invoiced - ARREARS FEES
  GL:
  8000000 - DEBIT full amount
  8000000 - CREDIT full amount


 */

    function handleArrearsERP(
    $tid, $created, $serialnumber, $paymentmethod_id, $paying_amount, $arrearsfees, $exclusive, $vat
    ) {
    debug_print("Entry: handleArrearsERP ( tid = $tid, created = $created, serialnumber = $serialnumber, paymentmethod_id = $paymentmethod_id, paying_amount = $paying_amount, arrearsfees - $arrearsfees, exclusive = $exclusive, vat = $vat )");

    if ($arrearsfees == 0)
        return true;

    debug_print("Creating debtor transaction record");

    $paymentmethod = loadPaymentMethod($paymentmethod_id);
    if ($paymentmethod === false)
        return false;

    $meter = loadMeterInformation($serialnumber);
    if ($meter === false)
        return false;

    $account = loadAccount($meter['account_id']);
    if ($account === false)
        return false;

    $branch = loadCustomerBranch($account['customerbranch_id']);
    if ($branch === false)
        return false;

    $branchcode = $branch['code'];
    $new_date = date('Y-m-d', strtotime($created));
    $period_id = fgetPeriod_id($new_date, __FILE__, __LINE__);
    $reference = substr($paymentmethod['code'], 0, 7) . ' ' . $tid;
    $salesorder_id = 0;
    $gst = 0.00;
    $freight = 0.00;
    $rate = 1.00;
    $invtext = '';
    $settled = 0;
    $discount = 0;
    $invtext = 'ReceivedMeter:' . $serialnumber . '(' . $branchcode . ')';
    $invtextevent = 'Received';
    $invtextserialnumber = $serialnumber;
    $invtextbranchcode = $branchcode;
    $meter_id = $meter['meter_id'];
    $posted = 1;

    $dtid = insertDebtorTrans(
            $tid, 4, $account['customerbranch_id'], $created, $period_id, $reference, $salesorder_id, ($arrearsfees), $gst, $freight, $rate, $invtext, $settled, $discount, $invtextevent, $invtextserialnumber, $invtextbranchcode, $meter_id
    );

    debug_print("Returning transaction id $dtid");
    debug_print("Exit: handleArrearsERP");
    return $dtid;
    }

    function handleArrears(
    &$trans, $options = array(
    "paymentplan" => true,
    "arrearsfee" => true
    ), $arrear_types = array(), $inclusive_filter = true, $use_erp
    ) {
    $atypes = debug_flatten_array($arrear_types);

    debug_print("Entry: handleArrears ( options = " . (debug_flatten_array($options)) . ", arrear_types = $atypes, inclusive = " . (($inclusive_filter) ? "true" : "false") . ", use_erp = " . (($use_erp) ? "yes" : "no") . " )");

    $total_arrears_fees = 0;
    $incoming_amount = tget($trans, "params.amount");
    $remaining = tget($trans, "work.calc.remaining");
    $vat_rate = tget($trans, "work.vat_rate");

    // We provide a filtering option
    $sqlFilter = "";
    if ($inclusive_filter == true) {
        $sqlFilter = ((count($arrear_types) == 0) ? "" : " AND arrearstype_id IN $atypes" );
    } else {
        $sqlFilter .= ((count($arrear_types) == 0) ? "" : " AND arrearstype_id NOT IN $atypes" );
    }


    $sql = "
		SELECT
			sa.id as 'specialarrearsid',
			sa.payplan,
			sa.amount as 'owed',
			sa.ismgmtfeepayable,
			(
				SELECT
					ifnull(sum(sap.amount), 0)
				FROM
					crescendo.specialarrearspayments sap
				WHERE
					sa.id = sap.specialarrear_id
					and iscompleted = 1
			) as 'paid'
		FROM
			crescendo.specialarrears sa
			join crescendo.arrearstypes at on sa.arrearstype_id = at.id
		WHERE
			sa.account_id = " . (tget($trans, "work.account_id")) . "
			and sa.startdate <= now()
			and sa.amount
				+
					(
						SELECT
							ifnull(sum(sap.amount), 0)
						FROM
							crescendo.specialarrearspayments sap
						WHERE
							sa.id = sap.specialarrear_id
							and iscompleted = 1
					) < 0
			$sqlFilter
		ORDER BY
			sa.startdate desc,
			sa.created desc
	";
    $res = fdbquery($sql);
    sql_check($sql);


    while ($rowf = fdbfetcharray($res)) {
        debug_print("Processing next arrears (remaining = $remaining)");

        $arrearsfees = 0;
        $exclusive = 0;
        $vat = 0;
        $specialarrearsid = $rowf['specialarrearsid'];
        $owed = $rowf['owed'];
        $paid = $rowf['paid'];
        $payplan = $rowf['payplan'];

        $ismgmtfeepayable = $rowf['ismgmtfeepayable'];

        $amountdue = -($owed + $paid);
        $payingamount = $amountdue;

        debug_print("Found: ( specialarrearsid = $specialarrearsid, owed = $owed, paid = $paid, payplan = $payplan, ismgmtfeepayable = $ismgmtfeepayable, amountdue = $amountdue, payingamount = $payingamount )");

        // Apply the payment plan if required
        if ($options['paymentplan']) {
            $tmp = round(($incoming_amount * ($payplan / 100)), 2);
            if ($tmp < $amountdue) {
                $amountdue = $tmp;
            }

            debug_print("Amount due after payplan adjustment ( incoming_amoubnt = $incoming_amount, amountdue =  $amountdue, payplan = $payplan )");
        }

        // No point carrying on if there is no amount due
        if ($amountdue <= 0)
            continue;

        // Adjusting down to whatever we can afford
        if ($remaining >= $amountdue) {
            $payingamount = $amountdue;
        } else {
            $payingamount = $remaining;
        }

        debug_print("Intending to pay ( payingamount = $payingamount )");

        if ($payingamount == 0)
            continue; // Will this even ever happen?


        if (tget($trans, "work.meter.debtortype_id") == 7) {
            if (($ismgmtfeepayable != 0) && ($options['arrearsfee'])) {
                debug_print("There is an arrears fee payable");

                if (tget($trans, "work.paymentmethod_id") == 11) { // Write Off
                    debug_print("Writing off arrears fees (Write Off)");
                    $arrearsfees = 0;
                } else {
                    $ideal = round(($payingamount + $payingamount / 10), 2);
                    $diff = $ideal - $payingamount;

                    debug_print("Adding arrears fees to become (total = $ideal, fees = $diff)");

                    $arrearsfees = $ideal - $payingamount;
                }

                debug_print("Paying values ( total = " . ($payingamount + $arrearsfees) . ", paying amount = $payingamount, arrearsfees = $arrearsfees )");

                $exclusive = round(((($arrearsfees * 1000 ) / (1 + $vat_rate)) / 1000), 2);
                $vat = $arrearsfees - $exclusive;
                debug_print("Calculated VAT on arrears fees ( arrears_fees = $arrearsfees, vat_rate = $vat_rate, exclusive = $exclusive, vat = $vat )");
            }
        }

        $remaining = $remaining - $payingamount;

        // Update running tally
        tadd($trans, "results.arrears", $payingamount);
        tadd($trans, "results.arrearsfees", $arrearsfees);
        tadd($trans, "results.vat", $vat);


        tset($trans, "work.calc.services", 0);
        tset($trans, "work.calc.arrears", $payingamount);
        tset($trans, "work.calc.arrearsfees", $arrearsfees);
        tset($trans, "work.calc.amount", ($payingamount));
        tset($trans, "work.calc.vat", $vat);
        tset($trans, "work.fees.excl", 0);
        tset($trans, "work.fees.tax", 0);
        tset($trans, "work.fees.landlord", 0);

        debug_print("Setting paymentmethod_id: 77");
        tset($trans, "work.paymentmethod_id", 77); // Set up as arrears receipt

        debug_print("Recording arrears payments " . (debug_flatten_array(array(
                    "specialarrear_id" => $specialarrearsid,
                    "payingamount" => $payingamount,
                    "arrearsfees" => $arrearsfees,
                    "total" => ($payingamount + $arrearsfees),
                    "total" => ($payingamount + $arrearsfees),
                    "vat" => $vat,
                    "exclusive" => $exclusive,
                    "mobile" => tget($trans, "work.mobile")
        ))));

        $tid = singleTransactionInsert($trans);

        setTransactionLink(tget($trans, "work.original_tid"), $tid);
        // Record heritage

        debug_print("Inserting payment record in specialarrearspayments");
        $sql = "
			INSERT INTO crescendo.specialarrearspayments
				(
					specialarrear_id,
					transaction_id,
					amount,
					iscompleted,
					created,
					editedby
				)
			VALUES
			(
				" . $specialarrearsid . ",
				" . ($tid) . ",
				" . ($payingamount) . ",
				1,
				now(),
				'" . (fdbescapestring(tget($trans, "work.mobile"))) . "'
			)
		";
        fdbquery($sql);
        sql_check($sql);


        // First we push the full amount
        debug_print("Pushing journal entry into ERP accounts ( transaction id = $tid )");


        // Now we push Arrears Fees to ERP ---------------------------


        if (($ismgmtfeepayable != 0) && ($options['arrearsfee'])) {
            updateTransaction($tid, array(
                "amount" => ($arrearsfees),
                "managementfees" => ($exclusive),
                "managementfeestax" => ($vat),
                "managementfeeslandlord" => 0
            ));

            if ($use_erp) {
                $rc = handleArrearsERP(
                        $tid, tget($trans, "work.created"), tget($trans, "work.serialnumber"), tget($trans, "work.incoming_paymentmethod_id"), $payingamount, $arrearsfees, $exclusive, $vat
                );

                if ($rc === false) {
                    debug_print("Posting to ERP failed");
                    return false;
                }
            }
        }


        // ---------------------------------------------------------


        updateTransaction($tid, array(
            "managementfees" => 0,
            "managementfeestax" => 0
        ));


        // Then we update Aurora
        tset($trans, "work.calc.amount", ($payingamount + $arrearsfees));
        tset($trans, "work.calc.arrearsfees", $arrearsfees);
        updateTransaction($tid, array(
            "amount" => ($payingamount + $arrearsfees),
            "arrearsfees" => $arrearsfees,
            "arrears" => $payingamount
        ));

        $total_arrears_fees += $arrearsfees;

        debug_print("Total arrears fees now ( total_arrears_fee = $total_arrears_fees )");

        freakout(
                ( $remaining < 0), "Remaining amount is less than zero. Possibly giving away free money. REPORT IMMEDIATELY ( tid = " .
                ($tid) . " )", true // fatal until proven otherwise
        );

        if ($remaining == 0) {
            debug_print("No more remaining balance. Stopping arrears processing");
            break;
        }
    }

    // Okay, so the tenant doesn't pay the arrears fees so they should be added back
    // into the amount remaining .. so that they go back to the wallet
    tset($trans, "work.calc.remaining", $remaining);

    debug_print("Exit: handleArrears");
}

    function handleManagementFees(&$trans, $use_erp) {
    debug_print("Entry: handleManagementFees ( use_erp = " . (($use_erp) ? "yes" : "no") . " )");

    handleArrears($trans, $options = array(
        "paymentplan" => false,
        "arrearsfee" => false
            ), $arrear_types = array(10), $inclusive_filter = true, $use_erp
    );

    debug_print("Exit: handleManagementFees");
    }

    function handleOtherArrears(&$trans, $arrearsfees, $use_erp) {
    debug_print("Entry: handleOtherArrears ( arrearsfees = " .
            (($arrearsfees) ? "yes" : "no") .
            ", use_erp = " . (($use_erp) ? "yes" : "no") . " ) ");

    handleArrears($trans, $options = array(
        "paymentplan" => true,
        "arrearsfee" => $arrearsfees
            ), $arrear_types = array(10), $inclusive_filter = false, $use_erp
    );

    debug_print("Exit: handleOtherArrears");
    }

    function handleVend(&$trans, $serialnumber, $remaining, $use_erp) {
    debug_print("Entry: handleVend ( serialnumber = $serialnumber, remaining = $remaining, use_erp = " . (($use_erp) ? "yes" : "no") . " )");

    $last_serialnumber = tget($trans, "work.serialnumber");
    
    // Need to have a transaction present and all set up
    // Then we need to pass it back into the main code

    $vat_rate = tget($trans, "work.vat_rate");
    $exclusive = round(((($remaining * 1000) / (1 + $vat_rate)) / 1000), 2);
    $vat = $remaining - $exclusive;
    $landlord = $exclusive;
    
    tset($trans, "work.serialnumber", ($serialnumber));

    tset($trans, "work.calc.services", ($exclusive));
    tset($trans, "work.calc.amount", ($vat + $exclusive));
    tset($trans, "work.calc.vat", $vat);
    tset($trans, "work.fees.excl", $exclusive);
    tset($trans, "work.fees.tax", $vat);
    tset($trans, "work.fees.landlord", 0);
    tset($trans, "work.calc.arrears", 0);
    tset($trans, "work.calc.arrearsfees", 0);

    tset($trans, "work.status", 4);   //	Processing ...
    if(in_array($trans['work']['source'], array('Clickatell','Cigicell'))){
    debug_print("Setting paymentmethod_id: 10");
    tset($trans, "work.paymentmethod_id", 10); // AutoVend
    }else{
    debug_print("Setting paymentmethod_id: 76");
    tset($trans, "work.paymentmethod_id", 76); // AutoVend    
    }
    // Update running totals
    tadd($trans, "results.vat", $vat);
    tadd($trans, "results.exclusive", $exclusive);
    tadd($trans, "results.vended.vat", $vat);
    tadd($trans, "results.vended.exclusive", $exclusive);

    $tid = singleTransactionInsert($trans);
    
    tset($trans, "work.serialnumber", ($last_serialnumber));
    
    
    setTransactionLink(tget($trans, "work.original_tid"), $tid);
    // Record heritage
    // WARNING: This function updates the transaction in the database, specifically
    // the wh, services, gst fields along with the transactiondetails and
    // transactiondetailsunits tables
    $calc = fcalctotalunitsbought(
            $serialnumber, $remaining, $tid
    );

    $wh = $calc['totalelectricityunitsbought'];

    tset($trans, "work.wh", $wh);

    if (($wh <= 0) || (($wh / 1000) > stsupperlimit)) {
        updateTransaction($tid, array("transactionstatus_id" => 5, "wh" => $wh));
        return false;
    }

    $ststoken = fgetststoken( $serialnumber, ($wh / 1000));
    if (($ststoken === false) || ($ststoken == '')) {
        updateTransaction($tid, array("transactionstatus_id" => 5, "wh" => $wh));
        return false;
    }

    tset($trans, "work.wh", $wh);
    tset($trans, "work.ststoken", $ststoken);
    updateTransaction($tid, array(
        "transactionstatus_id" => 1,
        "wh" => $wh,
        "ststoken" => $ststoken,
        "amount" => $remaining,
        "managementfees" => 0,
        "managementfeestax" => 0,
        "managementfeeslandlord" => 0
    ));

    $result = array(
       "serialnumber"=>$serialnumber,
       "ststoken" => $ststoken,
       "wh" => $wh,
       "tid" => $tid,
       "remaining" => $remaining
    );
    
    tset($trans, "results.ststoken", $ststoken);
    tset($trans, "results.wh", $wh);

    debug_print("Returning transaction id $tid");
    
    return $result;
    //return $tid;
}

function autovend_cal(&$trans, $remaining, $use_erp) {

    $default = $trans['work']['meter']['av_splitperc_default'];
    $other = $trans['work']['meter']['av_splitperc_other'];
    $wallet = $trans['work']['meter']['av_splitperc_wallet'];
    $isautovend = $trans['work']['meter']['isautovend'];
    $Dserialnumber = $trans['work']['meter']['serialnumber'];
    $accountId = $trans['work']['meter']['account_id'];
    $percentage = $wallet + $default + $other;

    if ($isautovend == 1) {
        
        $meter_array = loadMetersForAccount($accountId);
        
        $rc = array();
        
        if ($default > 0) {
            
            $amount = round(($default * $remaining) / 100, 2);
            
            $rc = handleVend($trans, $Dserialnumber, $amount, $use_erp);
                      
            // Update $remaining here for whatever is remaining
            // $remaining = $new remaining
            //$remaining = $remaining - $amount;
            
            if($rc === false){
                return false;
            }
                        
        }       
               
        if ($other > 0) {
         
            $meter_count = count($meter_array);
            if($meter_count == 2){
                $serial_other = array_diff($meter_array, [$Dserialnumber]); 
            foreach ($serial_other as $key => $value) {
                $serial_other = $value;
            }
           
            $amount = round(($other * $remaining) / 100, 2);
            
            $rc_other = handleVend($trans, $serial_other, $amount, $use_erp);
            
            $rc = array_merge_recursive($rc,$rc_other); 
            
             if($rc_other === false){
                return  false;
            }                            
        }
        
       }
       return $rc;
      }
    }

    function rejectDebtorType(&$trans, $amount, $use_erp, $transaction_id) {
    debug_print("Entry: rejectDebtorType ( amount = $amount, use_erp = " . (($use_erp) ? "yes" : "no") . ", transaction_id = $transaction_id )");

    tset($trans, "work.account_id", tget($trans, "work.incoming_account_id"));

    $tid = handleIncomingFunds($trans, $use_erp, $transaction_id);
    //Create transaction and return the transaction id.

    $account_id = tget($trans, "work.account_id");

    $sql = "
		UPDATE
			crescendo.transactions tx
		SET
			tx.account_id = " . $account_id . ",
			tx.description = 'Declined',
			tx.transactionstatus_id = 6
		WHERE
			tx.id = " . $tid . "
	";
    fdbquery($sql);
    sql_check($sql);

    tset($trans, "work.tid", $tid);

    debug_print("Exit: rejectDebtorType");
    }

    function sendToUNA(&$trans, $amount, $use_erp, $transaction_id) {
    debug_print("Entry: sendToUNA ( amount = $amount, use_erp = " . (($use_erp) ? "yes" : "no") . ", transaction_id = $transaction_id )");

    $tid = handleIncomingFunds($trans, $use_erp, $transaction_id, 1);
    //Create transaction and return the transaction id.

    tset($trans, "work.tid", $tid);

    debug_print("Exit: sendToUNA");
    }

    
