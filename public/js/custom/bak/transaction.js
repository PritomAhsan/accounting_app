$('.invoice-payment').click(function () {
    var invoiceId = $(this).attr('id');

    $.ajax({
        method : "GET",
        url : 'http://localhost/account-app/public/select-invoice-info/'+invoiceId,
        dataType : 'JSON',
        success : function (data) {
            $('#invoicePaymentAmount').val(data.invoice_total_price - data.paid_amount);
            $('#invoicePaymentId').val(data.id);
        }
    });

    $('#invoicePaymentModal').modal('show');
    return false;
});


$('.bill-payment').click(function () {
    var billId = $(this).attr('id');

    $.ajax({
        method : "GET",
        url : 'http://localhost/account-app/public/select-bill-info/'+billId,
        dataType : 'JSON',
        success : function (data) {
            $('#billPaymentAmount').val(data.bill_total_price - data.paid_amount);
            $('#billPaymentId').val(data.id);
        }
    });

    $('#billPaymentModal').modal('show');
    return false;
});


var maxFieldNumber = 1;
$('#addIncomeBtn').click(function () {
    var expenseWrapperElementContent = $('#expenseWrapperElement').html();
    if(expenseWrapperElementContent != null) {
        $('#expenseWrapperElement').css('display', 'none');
        $('#incomeWrapperElement').css('display', 'block');
    }
    if(maxFieldNumber == 1) {
            $.ajax({
                method : "GET",
                url : 'http://localhost/account-app/public/select-income-account',
                dataType : 'JSON',
                success : function (data) {
                    // incomeAccounts = data;
                    for (var i=0; i<=Object.keys(data).length-1; i++) {
                        $('#incomeAccount').append('<option value="'+data[i].account_code+'">'+data[i].account_name+'</option>');
                    }
                }
            });

            $.ajax({
                method : "GET",
                url : 'http://localhost/account-app/public/select-owners-equity-account',
                dataType : 'JSON',
                success : function (data) {
                    // incomeAccounts = data;
                    for (var i=0; i<=Object.keys(data).length-1; i++) {
                        $('#ownersEquityAccount').append('<option value="'+data[i].account_code+'">'+data[i].account_name+'</option>');
                    }
                }
            });

            $.ajax({
                method : "GET",
                url : 'http://localhost/account-app/public/select-cash-bank-account',
                dataType : 'JSON',
                success : function (data) {
                    // incomeAccounts = data;
                    for (var i=0; i<=Object.keys(data).length-1; i++) {
                        $('#incomeCashBankAccount').append('<option value="'+data[i].account_code+'">'+data[i].account_name+'</option>');
                    }
                }
            });

            $('#newWrapperForTransaction').append(
                '<div id="incomeWrapperElement">' +
                '<div class="form-row m-b-20">' +
                '<div class="col-md-2">' +
                '<input type="date" class="form-control" name="transaction_date" id="incomeTransactionDate" required>' +
                '</div>' +
                '<div class="col-md col-sm-12">' +
                '<select class="form-control" name="account_category_id" id="incomeTransactionCategoryId" required>' +
                '<option> --- Select Account Category --- </option>' +
                '<optgroup label="Income Accounts" id="incomeAccount">' +
                '</optgroup>' +
                '<optgroup label="Owners Equity Accounts" id="ownersEquityAccount">' +
                '</optgroup>' +
                '</select>' +
                '</div>' +
                '<div class="col-md col-sm-12">' +
                '<select name="payment_account" id="incomeTransactionPaymentAccountCode" class="form-control">' +
                '<option> --- Select Payment Account --- </option>' +
                '<optgroup label="Cash & Bank Accounts" id="incomeCashBankAccount">' +
                '</optgroup>' +
                '</select>' +
                '</div>' +
                '<div class="col-md col-sm-12">' +
                '<select name="payment_type" id="incomeTransactionPaymentType" class="form-control">' +
                '<option> --- Select Payment Method --- </option>' +
                '<option value="Bank Payment">Bank Payment</option>' +
                '<option value="Cash">Cash</option>' +
                '<option value="Check">Check</option>' +
                '<option value="Credit Cart">Credit Cart</option>' +
                '<option value="Paypal">Paypal</option>' +
                '<option value="Other">Other</option>' +
                '</select>' +
                '</div>' +
                '<div class="col-md-2">' +
                '<input type="text" class="form-control" name="payment_amount" id="incomeTransactionPaymentAmount" size="16" placeholder="Enter Amount" required>' +
                '</div>' +
                '</div>' +
                '<div class="form-group">' +
                '<textarea name="payment_description" required id="incomeTransactionPaymentDescription" class="form-control" rows="4" placeholder="Add a description..."></textarea>' +
                '</div>' +
                '<div class="form-group m-0 p-0">' +
                '<input type="button" name="btn" class="btn btn-flat btn-block btn-primary" value="Save Income Transaction" onclick="createNewAddIncome()">' +
                '</div>' +
                '</div>'
            );
    }
    maxFieldNumber++;
    return false;
  });

function createNewAddIncome() {
    event.preventDefault();
    $.ajax({
        method : "POST",
        url : 'http://localhost/account-app/public/new-income-transaction',
        dataType : 'JSON',
        data : {
            _token: $('input[name="_token"]').val(),
            incomeTransactionDate: $('#incomeTransactionDate').val(),
            incomeTransactionCategoryId: $('#incomeTransactionCategoryId').val(),
            incomeTransactionPaymentAccountCode: $('#incomeTransactionPaymentAccountCode').val(),
            incomeTransactionPaymentType: $('#incomeTransactionPaymentType').val(),
            incomeTransactionPaymentAmount: $('#incomeTransactionPaymentAmount').val(),
            incomeTransactionPaymentDescription: $('#incomeTransactionPaymentDescription').val()
        },

        success : function (data) {
            alert(data);
            window.location = "/account-app/public/transaction/add";
        }
    });
}


var expenseFieldNumber = 1;
$('#addExpenseBtn').click(function () {
        event.preventDefault();
        var incomeWrapperElementContent = $('#incomeWrapperElement').html();
        if(incomeWrapperElementContent != null) {
            $('#expenseWrapperElement').css('display', 'block');
            $('#incomeWrapperElement').css('display', 'none');
        }
        if(expenseFieldNumber==1) {
            $.ajax({
                method : "GET",
                url : 'http://localhost/account-app/public/select-expense-account',
                dataType : 'JSON',
                success : function (data) {
                    // incomeAccounts = data;
                    for (var i=0; i<=Object.keys(data).length-1; i++) {
                        $('#expenseAccount').append('<option value="'+data[i].account_code+'">'+data[i].account_name+'</option>');
                    }
                }
            });

            $.ajax({
                method : "GET",
                url : 'http://localhost/account-app/public/select-owners-equity-account',
                dataType : 'JSON',
                success : function (data) {
                    // incomeAccounts = data;
                    for (var i=0; i<=Object.keys(data).length-1; i++) {
                        $('#expenseOwnersEquityAccount').append('<option value="'+data[i].account_code+'">'+data[i].account_name+'</option>');
                    }
                }
            });

            $.ajax({
                method : "GET",
                url : 'http://localhost/account-app/public/select-cash-bank-account',
                dataType : 'JSON',
                success : function (data) {
                    // incomeAccounts = data;
                    for (var i=0; i<=Object.keys(data).length-1; i++) {
                        $('#expenseCashBankAccount').append('<option value="'+data[i].account_code+'">'+data[i].account_name+'</option>');
                    }
                }
            });

            $('#newWrapperForTransaction').append(
                '<div id="expenseWrapperElement">' +
                '<div class="form-row m-b-20">' +
                '<div class="col-md-2">' +
                '<input type="date" class="form-control" name="transaction_date" id="expenseTransactionDate" required>' +
                '</div>' +
                '<div class="col-md col-sm-12">' +
                '<select class="form-control" name="account_category_id" id="expenseTransactionCategoryId" required>' +
                '<option> --- Select Account Category --- </option>' +
                '<optgroup label="Expense Accounts" id="expenseAccount">' +
                '</optgroup>' +
                '<optgroup label="Owners Equity Accounts" id="expenseOwnersEquityAccount">' +
                '</optgroup>' +
                '</select>' +
                '</div>' +
                '<div class="col-md col-sm-12">' +
                '<select name="payment_account" id="expenseTransactionPaymentAccountCode" class="form-control">' +
                '<option> --- Select Payment Account --- </option>' +
                '<optgroup label="Cash & Bank Accounts" id="expenseCashBankAccount">' +
                '</optgroup>' +
                '</select>' +
                '</div>' +
                '<div class="col-md col-sm-12">' +
                '<select name="payment_type" id="incomeTransactionPaymentType" class="form-control">' +
                '<option> --- Select Payment Method --- </option>' +
                '<option value="Bank Payment">Bank Payment</option>' +
                '<option value="Cash">Cash</option>' +
                '<option value="Check">Check</option>' +
                '<option value="Credit Cart">Credit Cart</option>' +
                '<option value="Paypal">Paypal</option>' +
                '<option value="Other">Other</option>' +
                '</select>' +
                '</div>' +
                '<div class="col-md-2">' +
                '<input type="text" class="form-control" name="payment_amount" id="expenseTransactionPaymentAmount" size="16" placeholder="Enter Amount" required>' +
                '</div>' +
                '</div>' +
                '<div class="form-group">' +
                '<textarea name="payment_description" required id="expenseTransactionPaymentDescription" class="form-control" rows="4" placeholder="Add a description..."></textarea>' +
                '</div>' +
                '<div class="form-group m-0 p-0">' +
                '<input type="button" name="btn" class="btn btn-flat btn-block btn-primary" value="Save Expense Transaction" onclick="createNewAddExpense()">' +
                '</div>' +
                '</div>'
            );
        }
        expenseFieldNumber++;

    });


    function createNewAddExpense() {
        event.preventDefault();
        $.ajax({
            method : "POST",
            url : 'http://localhost/account-app/public/new-expense-transaction',
            dataType : 'JSON',
            data : {
                _token: $('input[name="_token"]').val(),
                expenseTransactionDate: $('#expenseTransactionDate').val(),
                expenseTransactionCategoryId: $('#expenseTransactionCategoryId').val(),
                expenseTransactionPaymentAccountCode: $('#expenseTransactionPaymentAccountCode').val(),
                expenseTransactionPaymentType: $('#expenseTransactionPaymentType').val(),
                expenseTransactionPaymentAmount: $('#expenseTransactionPaymentAmount').val(),
                expenseTransactionPaymentDescription: $('#expenseTransactionPaymentDescription').val()
            },

            success : function (data) {
                alert(data);
                window.location = "/account-app/public/transaction/add";
            }
        });
    }

    function selectAssetAccount(x) {
        $.ajax({
            method : "GET",
            url : 'http://localhost/account-app/public/select-asset-account',
            dataType : 'JSON',
            success : function (data) {
                for (var i=0; i<=Object.keys(data).length-1; i++) {
                    $('#journalAssetAccount'+x).append('<option value="'+data[i].account_code+'">'+data[i].account_name+'</option>');
                }
            }
        });
    }

    function selectLiabilitiesAccount(x) {
        $.ajax({
            method : "GET",
            url : 'http://localhost/account-app/public/select-liabilities-account',
            dataType : 'JSON',
            success : function (data) {
                for (var i=0; i<=Object.keys(data).length-1; i++) {
                    $('#journalLiabilitiesAccount'+x).append('<option value="'+data[i].account_code+'">'+data[i].account_name+'</option>');
                }
            }
        });
    }

    function selectIncomeAccount(x) {
        $.ajax({
            method : "GET",
            url : 'http://localhost/account-app/public/select-journal-income-account',
            dataType : 'JSON',
            success : function (data) {
                for (var i=0; i<=Object.keys(data).length-1; i++) {
                    $('#journalIncomeAccount'+x).append('<option value="'+data[i].account_code+'">'+data[i].account_name+'</option>');
                }
            }
        });
    }

    function selectExpenseAccount(x) {
        $.ajax({
            method : "GET",
            url : 'http://localhost/account-app/public/select-journal-expense-account',
            dataType : 'JSON',
            success : function (data) {
                for (var i=0; i<=Object.keys(data).length-1; i++) {
                    $('#journalExpenseAccount'+x).append('<option value="'+data[i].account_code+'">'+data[i].account_name+'</option>');
                }
            }
        });
    }

    function selectOwnersEquityAccount(x) {
        $.ajax({
            method : "GET",
            url : 'http://localhost/account-app/public/select-journal-owners-equity-account',
            dataType : 'JSON',
            success : function (data) {
                for (var i=0; i<=Object.keys(data).length-1; i++) {
                    $('#journalOwnersEquityAccount'+x).append('<option value="'+data[i].account_code+'">'+data[i].account_name+'</option>');
                }
            }
        });
    }

    var indexNo = 2;

    $('#addALine').click(function () {
        event.preventDefault();
        selectAssetAccount(indexNo);
        selectLiabilitiesAccount(indexNo);
        selectIncomeAccount(indexNo);
        selectExpenseAccount(indexNo);
        selectOwnersEquityAccount(indexNo);
        newInderxID = indexNo+1;
        $('#jt-'+indexNo).after(
            '<tr id="jt-'+newInderxID+'">' +
            '<td class="align-middle p-l-20 p-r-20">' +
            '<select class="form-control" name="transaction['+indexNo+'][account_code]">' +
            '<option> -- Select Account --- </option>' +
            '<optgroup label="Asset Account">' +
            '</optgroup>' +
            '<optgroup label="Liabilities Account">' +
            '</optgroup>' +
            '<optgroup label="Income Account">' +
            '</optgroup>' +
            '<optgroup label="Expense Account">' +
            '</optgroup>' +
            '<optgroup label="Owners Equity Account">' +
            '</optgroup>' +
            '</select>' +
            '</td>' +
            '<td class="p-l-20 p-r-20 p-t-10 p-b-10"><textarea class="form-control" name="transaction['+indexNo+'][account_description]" rows="3"></textarea></td>' +
            '<td class="align-middle p-l-20 p-r-20"><input type="text" name="transaction['+indexNo+'][debit]" class="form-control" onkeyup="calculateTotalDebitAmount()"/></td>' +
            '<td class="align-middle p-l-20 p-r-20"><input type="text" name="transaction['+indexNo+'][credit]" class="form-control" onkeyup="calculateTotalCreditAmount()"/></td>' +
            '</tr>'
        );
        indexNo++;
    });


    function calculateTotalDebitAmount() {
        var debitAmountBox = 0;
        var sum = 0;
        $('#manualJournalTable tr[id]').each(function () {
            sum = Number(sum) + Number($('input[name="transaction['+debitAmountBox+'][debit]"]').val());
            debitAmountBox++;
        });
        $('#totalDebit').val(sum);

        checkDebitCreditStatus();
    }

    function calculateTotalCreditAmount() {
        var debitAmountBox = 0;
        var sum = 0;
        $('#manualJournalTable tr[id]').each(function () {
            sum = Number(sum) + Number($('input[name="transaction['+debitAmountBox+'][credit]"]').val());
            debitAmountBox++;
        });
        $('#totalCredit').val(sum);

        checkDebitCreditStatus();
    }



function checkDebitCreditStatus() {
    var finalTotalDebitAmount = $('#totalDebit').val();
    var finalTotalCreditAmount = $('#totalCredit').val();

    if(finalTotalDebitAmount == finalTotalCreditAmount) {
        $('#submitBtn').css('display', 'block');
    } else {
        $('#submitBtn').css('display', 'none');
    }
}



var editJournalIndex = $('.edit-journal').attr('id');
var editJournalIndexNo = editJournalIndex-1;

$('.edit-journal').click(function () {
    event.preventDefault();

    selectAssetAccount(editJournalIndex);
    selectLiabilitiesAccount(editJournalIndex);
    selectIncomeAccount(editJournalIndex);
    selectExpenseAccount(editJournalIndex);
    selectOwnersEquityAccount(editJournalIndex);
    $('#jt-'+editJournalIndexNo).after(
        '<tr id="jt-'+editJournalIndex+'">' +
        '<td class="align-middle p-l-20 p-r-20">' +
        '<select class="form-control" name="transaction['+editJournalIndex+'][account_code]">' +
        '<option> -- Select Account --- </option>' +
        '<optgroup label="Asset Account" id="journalAssetAccount'+editJournalIndex+'">' +
        '</optgroup>' +
        '<optgroup label="Liabilities Account" id="journalLiabilitiesAccount'+editJournalIndex+'">' +
        '</optgroup>' +
        '<optgroup label="Income Account" id="journalIncomeAccount'+editJournalIndex+'">' +
        '</optgroup>' +
        '<optgroup label="Expense Account" id="journalExpenseAccount'+editJournalIndex+'">' +
        '</optgroup>' +
        '<optgroup label="Owners Equity Account" id="journalOwnersEquityAccount'+editJournalIndex+'">' +
        '</optgroup>' +
        '</select>' +
        '</td>' +
        '<td class="p-l-20 p-r-20 p-t-10 p-b-10"><textarea class="form-control" name="transaction['+editJournalIndex+'][account_description]" rows="3"></textarea></td>' +
        '<td class="align-middle p-l-20 p-r-20"><input type="text" name="transaction['+editJournalIndex+'][debit]" class="form-control" onkeyup="calculateTotalDebitAmount()"/></td>' +
        '<td class="align-middle p-l-20 p-r-20"><input type="text" name="transaction['+editJournalIndex+'][credit]" class="form-control" onkeyup="calculateTotalCreditAmount()"/></td>' +
        '</tr>'
    );
    editJournalIndexNo++;
    editJournalIndex++;
});

/* edit start on 24.03.2018 */

$('.verified-transaction').click(function () {
    event.preventDefault();
    var transactionId = $(this).attr('id');
    $.ajax({
        method: "GET",
        url: "http://localhost/account-app/public/verified-transaction/"+transactionId,
        dataType: 'JSON',
        success: function (data) {
            alert(data);
            window.location = "/account-app/public/transaction/add";
        }
    });
});

$('.not-verified-transaction').click(function () {
    event.preventDefault();
    var transactionId = $(this).attr('id');
    $.ajax({
        method: "GET",
        url: "http://localhost/account-app/public/not-verified-transaction/"+transactionId,
        dataType: 'JSON',
        success: function (data) {
            alert(data);
            window.location = "/account-app/public/transaction/add";
        }
    });
});

$('#searchTransactionStatus').change(function () {
    var searchItem = $(this).val();
    if(searchItem == ' '){
        alert('Please select a valid transaction status');
    } else {
        $.ajax({
            method : "GET",
            url : 'http://localhost/account-app/public/get-transaction-by-search-item/'+searchItem,
            dataType : 'JSON',
            success : function (data) {
                $('#outputResult').html(data);
            }
        })
    }
});

$('#searchTransactionType').change(function () {
    var searchItem = $(this).val();
    if(searchItem == ' '){
        alert('Please select a valid transaction type');
    } else {
        $.ajax({
            method : "GET",
            url : 'http://localhost/account-app/public/get-transaction-by-search-type/'+searchItem,
            dataType : 'JSON',
            success : function (data) {
                $('#outputResult').html(data);
            }
        })
    }
});

$('#searchTransactionAccountCategory').change(function () {
    var searchItem = $(this).val();
    if(searchItem == ' ') {
        alert('Please select a valid transaction type');
    } else {
        $.ajax({
            method : "GET",
            url : 'http://localhost/account-app/public/get-transaction-by-account-category/'+searchItem,
            dataType : 'JSON',
            success : function (data) {
                $('#outputResult').html(data);
            }
        })
    }
});

$('#searchTransactionPaymentAccount').change(function () {
    var searchItem = $(this).val();
    if(searchItem == ' ') {
        alert('Please select a valid transaction type');
    } else {
        $.ajax({
            method : "GET",
            url : 'http://localhost/account-app/public/get-transaction-by-payment-account/'+searchItem,
            dataType : 'JSON',
            success : function (data) {
                $('#outputResult').html(data);
            }
        })
    }
});

$('#find').click(function () {
    var startDate   = $('#startDate').val();
    var endDate     = $('#endDate').val();
    if(startDate == '' || endDate== '') {
        alert('Please select a valid date range');
    } else {
        $.ajax({
            method : "GET",
            url : 'http://localhost/account-app/public/get-transaction-by-date/'+startDate+'/'+endDate,
            dataType : 'JSON',
            success : function (data) {
                $('#outputResult').html(data);
            }
        })
    }
});

/* single transaction report script */

$('#singleTransactionWrapper').css('display', 'none');

$('#singleTransactionBtn').click(function () {
    event.preventDefault();
    var transactionAccountCode  = $('#transactionAccountCode').val();
    var transactionsStartDate   = $('#transactionsStartDate').val();
    var transactionsEndDate     = $('#transactionsEndDate').val();
    if(transactionAccountCode == ' ' || transactionsStartDate == '' || transactionsEndDate == '') {
        alert('Please select a valid account, from and to date. Thanks !');
    } else {
        /*need account name for report here....*/
        $.ajax({
            method : "GET",
            url : 'http://localhost/account-app/public/get-transaction-by-account-code/'+transactionAccountCode+'/'+transactionsStartDate+'/'+transactionsEndDate,
            dataType : 'JSON',
            success : function (response) {
                if(response != '') {
                    $('#transactionsTbody').empty();
                     var balance = 0;
                     for (var i=0; i<=Object.keys(response).length-1; i++) {
                         /* response[i].account_code == income account(first digit = 3) or expense account (first digit = 4)*/
                         if(response[i].account_code.substring(0, 1) == 4 || response[i].account_code.substring(0, 1) == 3) {
                             $('#balance').css('display', 'none');
                             $('#transactionsTbody').append(
                                 '<tr>'+
                                 '<td>'+response[i].journal_date+'</td>'+
                                 '<td>'+response[i].description+'</td>'+
                                 '<td>'+response[i].debit+'</td>'+
                                 '<td>'+response[i].credit+'</td>'+
                                 '</tr>'
                             );
                         } else {
                             if(i == 0) {
                                 balance = (response[i].debit-response[i].credit);
                             } else {
                                 balance = balance + (response[i].debit-response[i].credit);
                             }
                             $('#balance').css('display', 'block');
                             $('#transactionsTbody').append(
                                 '<tr>'+
                                 '<td>'+response[i].journal_date+'</td>'+
                                 '<td>'+response[i].description+'</td>'+
                                 '<td>'+response[i].debit+'</td>'+
                                 '<td>'+response[i].credit+'</td>'+
                                 '<td>'+balance+'</td>'+
                                 '</tr>'
                             );
                         }
                     }
                    $.ajax({
                        method : "GET",
                        url : 'http://localhost/account-app/public/get-account-name-by-code/'+transactionAccountCode,
                        dataType : 'JSON',
                        success : function (response) {
                            $('#reportAccountName').text(response.account_name);
                        }
                    });
                     var startDate = new Date(transactionsStartDate);
                     var endDate = new Date(transactionsEndDate);
                     var options = {day: 'numeric',month: 'long',year: 'numeric'}
                    $('#reportDate').text('Form '+ startDate.toLocaleDateString('en-ZA', options) +' To '+ endDate.toLocaleDateString('en-ZA', options));
                    $('#singleTransactionWrapper').css('display', 'block');
                } else {
                    alert('This account does not have any transaction. Thanks !');
                    $('#singleTransactionWrapper').css('display', 'none');
                }
                //$('#outputResult').html(data);
            }
        })
    }
});

/* single transaction report script */








