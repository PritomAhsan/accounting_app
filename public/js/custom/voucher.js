function selectVoucherAssetAccount(x) {
    $.ajax({
        method  : "GET",
        url     : 'api/select-cash-bank-account',
        dataType: 'JSON',
        success : function (data) {
            for (var i=0; i<=Object.keys(data).length-1; i++) {
                $('#voucherAssetAccount'+x).append('<option value="'+data[i].account_code+'">'+data[i].account_name+'</option>');
            }
        }
    });
}


/* ============ payment voucher =============== */

function selectPaymentVoucherExpenseAccount(x) {
    $.ajax({
        method : "GET",
        url : 'api/select-journal-expense-account',
        dataType : 'JSON',
        success : function (data) {
            for (var i=0; i<=Object.keys(data).length-1; i++) {
                $('#paymentVoucherExpenseAccount'+x).append('<option value="'+data[i].account_code+'">'+data[i].account_name+'</option>');
            }
        }
    });
}

function disableInputField() {
    var dropDown = $(event.target);
    var accountCode = dropDown.val();
    var rowIndex = dropDown.attr("data-value");
    var accountTitle = accountCode.substring(0, 1);
    if(accountTitle == 2) {
        $('#debit'+rowIndex).prop('readonly', true);
        $('#credit'+rowIndex).prop('readonly', false);
    } else if(accountTitle == 4) {
        $('#credit'+rowIndex).prop('readonly', true);
        $('#debit'+rowIndex).prop('readonly', false);
    }
}


function checkPaymentVoucherDebitCreditStatus() {
    var finalTotalPaymentVoucherDebitAmount = $('#totalPaymentVoucherDebit').val();
    var finalTotalPaymentVoucherCreditAmount = $('#totalPaymentVoucherCredit').val();
    if(finalTotalPaymentVoucherDebitAmount == finalTotalPaymentVoucherCreditAmount) {
        $('#paymentVoucherSubmitBtn').css('display', 'block');
    } else {
        $('#paymentVoucherSubmitBtn').css('display', 'none');
    }
}

function paymentVoucherTotalDebit() {
    var debitAmountBox = 0;
    var sum = 0;
    $('#paymentVoucherTable tr[id]').each(function () {
        sum = Number(sum) + Number($('input[name="transaction['+debitAmountBox+'][debit]"]').val());
        debitAmountBox++;
    });
    $('#totalPaymentVoucherDebit').val(sum);

    checkPaymentVoucherDebitCreditStatus();
}

function paymentVoucherTotalCredit() {
    var creditAmountBox = 0;
    var sum = 0;
    $('#paymentVoucherTable tr[id]').each(function () {
        sum = Number(sum) + Number($('input[name="transaction['+creditAmountBox+'][credit]"]').val());
        creditAmountBox++;
    });
    $('#totalPaymentVoucherCredit').val(sum);

    checkPaymentVoucherDebitCreditStatus();
}

$('#voucherAddALine').click(function () {
    event.preventDefault();
    var indexNo = $('#paymentVoucherTable tr:last').attr('id');
    selectVoucherAssetAccount(indexNo);
    selectPaymentVoucherExpenseAccount(indexNo);
    newIndexId = Number(indexNo)+1;
    $('#paymentVoucherTable tr:last').after(
        '<tr id="'+newIndexId+'">'+
        '<td>'+
        '<select class="form-control" onchange="disableInputField()" data-value="'+newIndexId+'" name="transaction['+indexNo+'][account_code]">'+
        '<option> -- Select Account --- </option>'+
        '<optgroup label="Asset Account" id="voucherAssetAccount'+indexNo+'">'+
        '</optgroup>'+
        '<optgroup label="Expense Account" id="paymentVoucherExpenseAccount'+indexNo+'">'+
        '</optgroup>'+
        '</select>'+
        '</td>'+
        '<td>'+
        '<textarea class="form-control" name="transaction['+indexNo+'][account_description]"></textarea>'+
        '</td>'+
        '<td>'+
        '<input type="text" class="form-control" onkeyup="paymentVoucherTotalDebit()" name="transaction['+indexNo+'][debit]" id="debit'+newIndexId+'"/>'+
        '</td>'+
        '<td>'+
        '<input type="text" class="form-control" onkeyup="paymentVoucherTotalCredit()" name="transaction['+indexNo+'][credit]" id="credit'+newIndexId+'"/>'+
        '</td>'+
        '</tr>'
    );
    indexNo++;
});

/* ============ payment voucher =============== */


/* ============ credit voucher =============== */


function selectCreditVoucherIncomeAccount(x) {
    $.ajax({
        method : "GET",
        url : 'api/select-journal-income-account',
        dataType : 'JSON',
        success : function (data) {
            for (var i=0; i<=Object.keys(data).length-1; i++) {
                $('#creditVoucherIncomeAccount'+x).append('<option value="'+data[i].account_code+'">'+data[i].account_name+'</option>');
            }
        }
    });
}


function disableCreditInputField() {
    var dropDown = $(event.target);
    var accountCode = dropDown.val();
    var rowIndex = dropDown.attr("data-value");
    var accountTitle = accountCode.substring(0, 1);
    if(accountTitle == 2) {
        $('#debit'+rowIndex).prop('readonly', false);
        $('#credit'+rowIndex).prop('readonly', true);
    } else if(accountTitle == 3) {
        $('#credit'+rowIndex).prop('readonly', false);
        $('#debit'+rowIndex).prop('readonly', true);
    }
}



function checkCreditVoucherDebitCreditStatus() {
    var finalTotalCreditVoucherDebitAmount = $('#totalCreditVoucherDebit').val();
    var finalTotalCreditVoucherCreditAmount = $('#totalCreditVoucherCredit').val();
    if(finalTotalCreditVoucherDebitAmount == finalTotalCreditVoucherCreditAmount) {
        $('#creditVoucherSubmitBtn').css('display', 'block');
    } else {
        $('#creditVoucherSubmitBtn').css('display', 'none');
    }
}

function creditVoucherTotalDebit() {
    var debitAmountBox = 0;
    var sum = 0;
    $('#creditVoucherTable tr[id]').each(function () {
        sum = Number(sum) + Number($('input[name="transaction['+debitAmountBox+'][debit]"]').val());
        debitAmountBox++;
    });
    $('#totalCreditVoucherDebit').val(sum);
    checkCreditVoucherDebitCreditStatus();
}

function creditVoucherTotalCredit() {
    var creditAmountBox = 0;
    var sum = 0;
    $('#creditVoucherTable tr[id]').each(function () {
        sum = Number(sum) + Number($('input[name="transaction['+creditAmountBox+'][credit]"]').val());
        creditAmountBox++;
    });
    $('#totalCreditVoucherCredit').val(sum);
    checkCreditVoucherDebitCreditStatus();
}



$('#creditVoucherAddALine').click(function () {
    event.preventDefault();
    var indexNo = $('#creditVoucherTable tr:last').attr('id');
    selectVoucherAssetAccount(indexNo);
    selectCreditVoucherIncomeAccount(indexNo);
    newIndexId = Number(indexNo)+1;
    $('#creditVoucherTable tr:last').after(
        '<tr id="'+newIndexId+'">'+
        '<td>'+
        '<select class="form-control" onchange="disableCreditInputField()" data-value="'+newIndexId+'" name="transaction['+indexNo+'][account_code]">'+
        '<option> -- Select Account --- </option>'+
        '<optgroup label="Asset Account" id="voucherAssetAccount'+indexNo+'">'+
        '</optgroup>'+
        '<optgroup label="Expense Account" id="creditVoucherIncomeAccount'+indexNo+'">'+
        '</optgroup>'+
        '</select>'+
        '</td>'+
        '<td>'+
        '<textarea class="form-control" name="transaction['+indexNo+'][account_description]"></textarea>'+
        '</td>'+
        '<td>'+
        '<input type="text" class="form-control" onkeyup="creditVoucherTotalDebit()" name="transaction['+indexNo+'][debit]" id="debit'+newIndexId+'"/>'+
        '</td>'+
        '<td>'+
        '<input type="text" class="form-control" onkeyup="creditVoucherTotalCredit()" name="transaction['+indexNo+'][credit]" id="credit'+newIndexId+'"/>'+
        '</td>'+
        '</tr>'
    );
    indexNo++;
});

/* ============ credit voucher =============== */