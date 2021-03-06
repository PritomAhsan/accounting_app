function openModal(modalId) {
    $(modalId).css('opacity', 0)
        .slideDown('slow')
        .animate(
            { opacity: 1 },
            { queue: false, duration: 'slow' }
        );
    $('<div class="modal-backdrop"></div>').appendTo(document.body);
    $('.modal-backdrop').css('opacity', 0)
        .animate(
            { opacity: 0.5 },
            { duration: 'slow' }
        );
    $(document.body).addClass('no-scroll');

}

function closeModal(modalId) {
    $(modalId).slideUp('slow')
        .animate(
            { opacity: 0 },
            { queue: false, duration: 'slow' }
        );
    $('.modal-backdrop').fadeOut('slow', function () {
        $(this).remove();
    });
    $(document.body).removeClass('no-scroll');
}

$('.edit-asset').click(function () {
    var assetId = $(this).attr('id');
    $.ajax({
        method : "GET",
        url: 'api/edit-asset/' + assetId,
        dataType : 'JSON',
        success : function (data) {
            $('#assetName').val(data.asset_name);
            $('#assetId').val(data.id);
            $('#assetCode').val(data.asset_code);
            $('#assetDescription').text(data.asset_description);
        }
    });
    openModal('#editAssetModal');
    return false;
});



/*sub Asset code
  parameter@id = Asset id;
*/
/*function createSubAssetCode(id, subAssetCode) {
    xmlHttp = new XMLHttpRequest();
    var serverPage='api/create-sub-asset-code/'+id;
    xmlHttp.open("GET", serverPage);
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            document.getElementById(subAssetCode).value = xmlHttp.responseText;
        }
    }
    xmlHttp.send(null);
}*/

function createSubAssetCode(id, subAssetCode) {
    $.ajax({
        method: "GET",
        url: 'api/create-sub-asset-code/' + id,
        dataType: 'JSON',
        success: function (data) {
            $(subAssetCode).val(data);
        }
    });
    return false;
}
/*sub Asset code*/

$('.edit-sub-asset').click(function () {
    var subAssetId = $(this).attr('id');
    $.ajax({
        method : "GET",
        url : 'api/edit-sub-asset/'+subAssetId,
        dataType : 'JSON',
        success : function (data) {
            $('#editAssetId').val(data.asset_id);
            $('#subAssetName').val(data.sub_asset_name);
            $('#subAssetId').val(data.id);
            $('#editSubAssetCode').val(data.sub_asset_code);
        }
    });
    openModal('#editSubAssetModal');
    return false;
});


/*Asset Account Code*/
/*$('.asset-account-name').click(function () {
    var subAssetId = $(this).attr('id');
    xmlHttp = new XMLHttpRequest();
    var serverPage='http://localhost/account-app-ela/public/create-asset-account-code/'+subAssetId;
    xmlHttp.open("GET", serverPage);
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            $('#assetAccountCode'+subAssetId).val(xmlHttp.responseText);
        }
    }
    xmlHttp.send(null);
});*/

$('.asset-account-name').click(function () {
    var subAssetId = $(this).attr('id');
    $.ajax({
        method: "GET",
        url: 'api/create-asset-account-code/'+subAssetId,
        dataType: 'JSON',
        success: function (data) {
            $('#assetAccountCode'+subAssetId).val(data);
        }
    });
    return false;
});

/*Asset Account Code*/


$('.edit-liabilitie').click(function () {
    var liabilitieId = $(this).attr('id');
    $.ajax({
        method : "GET",
        url : 'api/edit-liabilities/'+liabilitieId,
        dataType : 'JSON',
        success : function (data) {
            $('#liabilitieName').val(data.liabilitie_name);
            $('#liabilitieId').val(data.id);
            $('#liabilitieCode').val(data.liabilitie_code);
            $('#liabilitieDescription').val(data.liabilitie_description);
        }
    });
    openModal('#editLiabilitieModal');
    return false;
});

/*
    sub liabilities code
    parameter@id = liabilitie id;
 */
/*function createSubLiabilitiesCode(id, subLiabilitieCode) {
    xmlHttp = new XMLHttpRequest();
    var serverPage='http://localhost/account-app-ela/public/create-sub-liabilitie-code/'+id;
    xmlHttp.open("GET", serverPage);
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            document.getElementById(subLiabilitieCode).value = xmlHttp.responseText;
        }
    }
    xmlHttp.send(null);
}*/

function createSubLiabilitiesCode(id, subLiabilitieCode) {
    $.ajax({
        method: "GET",
        url: 'api/create-sub-liabilitie-code/'+id,
        dataType: 'JSON',
        success: function (data) {
            $(subLiabilitieCode).val(data);
        }
    });
    return false;
}
/*sub liabilities code*/


$('.edit-sub-liabilitie').click(function () {
    var subLiabilitieId = $(this).attr('id');
    $.ajax({
        method : "GET",
        url : 'api/edit-sub-liabilities/'+subLiabilitieId,
        dataType : 'JSON',
        success : function (data) {
            $('#editLiabilitieId').val(data.liabilitie_id);
            $('#subLiabilitieName').val(data.sub_liabilitie_name);
            $('#subLiabilitieId').val(data.id);
            $('#editSubLiabilitieCode').val(data.sub_liabilitie_code);
        }
    });
    openModal('#editSubLiabilitieModal');
    return false;
});


/*Liabilitie Account Code*/
/*$('.liabilitie-account-name').click(function () {
    var subLiabilitieId = $(this).attr('id');
    xmlHttp = new XMLHttpRequest();
    var serverPage='http://localhost/account-app-ela/public/create-liabilitie-account-code/'+subLiabilitieId;
    xmlHttp.open("GET", serverPage);
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            $('#liabilitieAccountCode'+subLiabilitieId).val(xmlHttp.responseText);
        }
    }
    xmlHttp.send(null);
});*/

$('.liabilitie-account-name').click(function () {
    var subLiabilitieId = $(this).attr('id');
    $.ajax({
        method: "GET",
        url: 'api/create-liabilitie-account-code/'+subLiabilitieId,
        dataType: 'JSON',
        success: function(data) {
            $('#liabilitieAccountCode'+subLiabilitieId).val(data);
        }
    });
    return false;
});
/*Liabilitie Account Code*/


$('.edit-owners-equity').click(function () {
    var ownersEquityId = $(this).attr('id');
    $.ajax({
        method : "GET",
        url : 'api/edit-owners-equity/'+ownersEquityId,
        dataType : 'JSON',
        success : function (data) {
            $('#ownersEquityName').val(data.owners_equity_name);
            $('#ownersEquityId').val(data.id);
            $('#ownersEquityCode').val(data.owners_equity_code);
            $('#ownersEquityDescription').val(data.owners_equity_description);
        }
    });
    openModal('#editOwnersEquityModal');
    return false;
});

/*
    sub Income code
    parameter@id = Income id;
*/
/*function createSubOwnersEquityCode(id, subOwnersEquityCode) {
    xmlHttp = new XMLHttpRequest();
    var serverPage='http://localhost/account-app-ela/public/create-sub-owners-equity-code/'+id;
    xmlHttp.open("GET", serverPage);
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            document.getElementById(subOwnersEquityCode).value = xmlHttp.responseText;
        }
    }
    xmlHttp.send(null);
}*/

function createSubOwnersEquityCode(id, subOwnersEquityCode) {
    $.ajax({
        method: "GET",
        url: 'api/create-sub-owners-equity-code/'+id,
        dataType: 'JSON',
        success: function(data) {
            $(subOwnersEquityCode).val(data);
        }
    });
    return false;
}

/*sub Income code*/

$('.edit-sub-owners-equity').click(function () {
    var subOwnersEquityId = $(this).attr('id');

    $.ajax({
        method : "GET",
        url : 'api/edit-sub-owners-equity/'+subOwnersEquityId,
        dataType : 'JSON',
        success : function (data) {
            $('#editOwnersEquityId').val(data.owners_equity_id);
            $('#subOwnersEquityName').val(data.sub_owners_equity_name);
            $('#subOwnersEquityId').val(data.id);
            $('#editSubOwnersEquityCode').val(data.sub_owners_equity_code);
        }
    });
    openModal('#editSubOwnersEquityModal');
    return false;
});


/*Owners Equity Account Code*/
/*$('.owners-equity-account-name').click(function () {
    var subOwnersEquityId = $(this).attr('id');
    xmlHttp = new XMLHttpRequest();
    var serverPage='http://localhost/account-app-ela/public/create-owners-equity-account-code/'+subOwnersEquityId;
    xmlHttp.open("GET", serverPage);
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            $('#ownersEquityAccountCode'+subOwnersEquityId).val(xmlHttp.responseText);
        }
    }
    xmlHttp.send(null);
});*/

$('.owners-equity-account-name').click(function () {
    var subOwnersEquityId = $(this).attr('id');
    $.ajax({
        method: "GET",
        url: 'api/create-owners-equity-account-code/'+subOwnersEquityId,
        dataType: 'JSON',
        success: function (data) {
            $('#ownersEquityAccountCode'+subOwnersEquityId).val(data);
        }
    });
});
/*Owners Equity Account Code*/



$('.edit-income').click(function () {
    var incomeId = $(this).attr('id');
    $.ajax({
        method : "GET",
        url : 'api/edit-income/'+incomeId,
        dataType : 'JSON',
        success : function (data) {
            $('#incomeName').val(data.income_name);
            $('#incomeId').val(data.id);
            $('#incomeCode').val(data.income_code);
            $('#incomeDescription').val(data.income_description);
        }
    });
    openModal('#editIncomeModal');
    return false;
});


/*sub Income code*/
/*
 parameter@id = Income id;
 */
/*function createSubIncomeCode(id, subIncomeCode) {
    xmlHttp = new XMLHttpRequest();
    var serverPage='http://localhost/account-app-ela/public/create-sub-income-code/'+id;
    xmlHttp.open("GET", serverPage);
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            document.getElementById(subIncomeCode).value = xmlHttp.responseText;
        }
    }
    xmlHttp.send(null);
}*/

function createSubIncomeCode(id, subIncomeCode) {
    $.ajax({
        method: "GET",
        url: 'api/create-sub-income-code/'+id,
        dataType: 'JSON',
        success: function (data) {
            $(subIncomeCode).val(data);
        }
    });
    return false;
}
/*sub Income code*/


/* edit sub Income*/

$('.edit-sub-income').click(function () {
    var subIncomeId = $(this).attr('id');
    $.ajax({
        method : "GET",
        url : 'api/edit-sub-income/'+subIncomeId,
        dataType : 'JSON',
        success : function (data) {
            $('#editIncomeId').val(data.income_id);
            $('#subIncomeName').val(data.sub_income_name);
            $('#subIncomeId').val(data.id);
            $('#editSubIncomeCode').val(data.sub_income_code);
        }
    });
    openModal('#editSubIncomeModal');
    return false;
});

/*Income Account Code*/
/*$('.income-account-name').click(function () {
    var subIncomeId = $(this).attr('id');
    xmlHttp = new XMLHttpRequest();
    var serverPage='http://localhost/account-app-ela/public/create-income-account-code/'+subIncomeId;
    xmlHttp.open("GET", serverPage);
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            $('#incomeAccountCode'+subIncomeId).val(xmlHttp.responseText);
        }
    }
    xmlHttp.send(null);
});*/

$('.income-account-name').click(function () {
    var subIncomeId = $(this).attr('id');
    $.ajax({
        method: "GET",
        url: 'api/create-income-account-code/'+subIncomeId,
        dataType: 'JSON',
        success: function (data) {
            $('incomeAccountCode'+subIncomeId).val(data);
        }
    });
    return false;
});
/*Income Account Code*/



$('.edit-expense').click(function () {
    var expenseId = $(this).attr('id');
    $.ajax({
        method : "GET",
        url : 'api/edit-expense/'+expenseId,
        dataType : 'JSON',
        success : function (data) {
            $('#expenseName').val(data.expense_name);
            $('#expenseId').val(data.id);
            $('#expenseCode').val(data.expense_code);
            $('#expenseDescription').val(data.expense_description);
        }
    });
    openModal('#editExpenseModal');
    return false;
});

/*
    sub Expense code
    parameter@id = Expense id;
*/
/*function createSubExpenseCode(id, subExpenseCode) {
    xmlHttp = new XMLHttpRequest();
    var serverPage='http://localhost/account-app-ela/public/create-sub-expense-code/'+id;
    xmlHttp.open("GET", serverPage);
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            document.getElementById(subExpenseCode).value = xmlHttp.responseText;
        }
    }
    xmlHttp.send(null);
}*/

function createSubExpenseCode(id, subExpenseCode) {
    $.ajax({
        method: "GET",
        url: 'api/create-sub-expense-code/'+id,
        dataType: 'JSON',
        success: function (data) {
            $(subExpenseCode).val(data);
        }
    });
    return false;
}
/*sub Expense code*/


$('.edit-sub-expense').click(function () {
    var subExpenseId = $(this).attr('id');
    $.ajax({
        method : "GET",
        url : 'api/edit-sub-expense/'+subExpenseId,
        dataType : 'JSON',
        success : function (data) {
            $('#editExpenseId').val(data.expense_id);
            $('#subExpenseName').val(data.sub_expense_name);
            $('#subExpenseId').val(data.id);
            $('#editSubExpenseCode').val(data.sub_expense_code);
        }
    });
    openModal('#editSubExpenseModal');
    return false;
});

/*Expense Account Code*/
/*$('.expense-account-name').click(function () {
    var subExpenseId = $(this).attr('id');
    xmlHttp = new XMLHttpRequest();
    var serverPage='http://localhost/account-app-ela/public/create-expense-account-code/'+subExpenseId;
    xmlHttp.open("GET", serverPage);
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            $('#expenseAccountCode'+subExpenseId).val(xmlHttp.responseText);
        }
    }
    xmlHttp.send(null);
});*/

$('.expense-account-name').click(function () {
   var subExpenseId = $(this).attr('id');
   $.ajax({
       method: "GET",
       url: 'api/create-expense-account-code/'+subExpenseId,
       dataType: 'JSON',
       success: function (data) {
           $('#expenseAccountCode'+subExpenseId).val(data);
       }
   });
   return false;
});

/*Expense Account Code*/

$('.edit-transaction').click(function () {
    event.preventDefault();
    var transactionId = $(this).attr('id');

    $.ajax({
        method : "GET",
        url : 'api/select-transaction-info-by-id/'+transactionId,
        dataType : 'JSON',
        success : function (data) {
            $('#editAccountCategory').css('display', 'block');
            $('#editTransactionDate').val(data.transaction_date);
            var transactionId = data.transaction_id;
            if(transactionId.substring(0, 3) == 'bil' || transactionId.substring(0, 3) == 'inv') {
                $('#editTransactionAccountCategory').val(' ');
                $('#editAccountCategory').css('display', 'none');
            } else {
                $('#editTransactionAccountCategory').val(data.account_category);
            }
            $('#editTransactionPaymentAccount').val(data.payment_account);
            $('#editTransactionDescription').val(data.payment_description);
            $('#editTransactionPaymentType').val(data.payment_type);
            $('#editTransactionAmount').val(data.payment_amount);
            $('#editTransactionId').val(data.id);
            $('#editJournalId').val(data.transaction_id);
        }
    });
    openModal('#editTransactionModal');
});

/*chart of account name & description update*/

function assetAccountNameUpdate(id) {
    xmlHttp = new XMLHttpRequest();
    var assetAccountName=document.getElementById('assetAccountName'+id).innerHTML;
    var serverPage='api/asset-account-name-update/'+assetAccountName+'/'+id;
    xmlHttp.open("GET", serverPage);
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            alert(xmlHttp.responseText);
        }
    };
    xmlHttp.send(null);
}

/*function assetAccountCodeUpdate(id) {
    xmlHttp = new XMLHttpRequest();
    var assetAccountCode=document.getElementById('assetAccountCode'+id).innerHTML;
    var serverPage='http://localhost/account-app-ela/public/asset-account-code-update/'+assetAccountCode+'/'+id;
    xmlHttp.open("GET", serverPage);
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            // alert(xmlHttp.responseText);
        }
    }
    xmlHttp.send(null);
}*/

function assetAccountDescriptionUpdate(id) {
    xmlHttp = new XMLHttpRequest();
    var assetAccountDescription=document.getElementById('assetAccountDescription'+id).innerHTML;
    var serverPage='api/asset-account-description-update/'+assetAccountDescription+'/'+id;
    xmlHttp.open("GET", serverPage);
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            alert(xmlHttp.responseText);
        }
    };
    xmlHttp.send(null);
}

function liabilitieAccountNameUpdate(id) {
    xmlHttp = new XMLHttpRequest();
    var liabilitieAccountName=document.getElementById('liabilitieAccountName'+id).innerHTML;
    var serverPage='api/liabilitie-account-name-update/'+liabilitieAccountName+'/'+id;
    xmlHttp.open("GET", serverPage);
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            alert(xmlHttp.responseText);
        }
    };
    xmlHttp.send(null);
}

function liabilitieAccountDescriptionUpdate(id) {
    xmlHttp = new XMLHttpRequest();
    var liabilitieAccountDescription=document.getElementById('liabilitieAccountDescription'+id).innerHTML;
    var serverPage='api/liabilitie-account-description-update/'+liabilitieAccountDescription+'/'+id;
    xmlHttp.open("GET", serverPage);
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            alert(xmlHttp.responseText);
        }
    };
    xmlHttp.send(null);
}

function ownersEquityAccountNameUpdate(id) {
    xmlHttp = new XMLHttpRequest();
    var ownersEquityAccountName=document.getElementById('ownersEquityAccountName'+id).innerHTML;
    var serverPage='api/owners-equity-account-name-update/'+ownersEquityAccountName+'/'+id;
    xmlHttp.open("GET", serverPage);
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            alert(xmlHttp.responseText);
        }
    };
    xmlHttp.send(null);
}

function ownersEquityAccountDescriptionUpdate(id) {
    xmlHttp = new XMLHttpRequest();
    var ownersEquityAccountDescription=document.getElementById('ownersEquityAccountDescription'+id).innerHTML;
    var serverPage='api/owners-equity-account-description-update/'+ownersEquityAccountDescription+'/'+id;
    xmlHttp.open("GET", serverPage);
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            alert(xmlHttp.responseText);
        }
    };
    xmlHttp.send(null);
}

function incomeAccountNameUpdate(id) {
    xmlHttp = new XMLHttpRequest();
    var incomeAccountName=document.getElementById('incomeAccountName'+id).innerHTML;
    var serverPage='api/income-account-name-update/'+incomeAccountName+'/'+id;
    xmlHttp.open("GET", serverPage);
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            alert(xmlHttp.responseText);
        }
    };
    xmlHttp.send(null);
}

function incomeAccountDescriptionUpdate(id) {
    xmlHttp = new XMLHttpRequest();
    var incomeAccountDescription=document.getElementById('incomeAccountDescription'+id).innerHTML;
    var serverPage='api/income-account-description-update/'+incomeAccountDescription+'/'+id;
    xmlHttp.open("GET", serverPage);
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            alert(xmlHttp.responseText);
        }
    };
    xmlHttp.send(null);
}

function expenseAccountNameUpdate(id) {
    xmlHttp = new XMLHttpRequest();
    var expenseAccountName=document.getElementById('expenseAccountName'+id).innerHTML;
    var serverPage='api/expense-account-name-update/'+expenseAccountName+'/'+id;
    xmlHttp.open("GET", serverPage);
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            alert(xmlHttp.responseText);
        }
    };
    xmlHttp.send(null);
}

function expenseAccountDescriptionUpdate(id) {
    xmlHttp = new XMLHttpRequest();
    var expenseAccountDescription=document.getElementById('expenseAccountDescription'+id).innerHTML;
    var serverPage='api/expense-account-description-update/'+expenseAccountDescription+'/'+id;
    xmlHttp.open("GET", serverPage);
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            alert(xmlHttp.responseText);
        }
    };
    xmlHttp.send(null);
}

/*chart of account name & description update*/

/* show hide income account */

    $('#sellProduct').click(function () {
        if (this.checked) {
            $('#incomeShowHide').css('display', 'flex');
        } else {
            $('#incomeShowHide').css('display', 'none');
        }
    });

/* show hide income account */


/* show hide expense account */

$('#buyProduct').click(function () {
    if (this.checked) {
        $('#expenseShowHide').css('display', 'flex');
    } else {
        $('#expenseShowHide').css('display', 'none');
    }
});


/* show hide expense account */


/*===============invoice=================*/

function selectCustomerInfo(id) {
    $.ajax({
        method : "GET",
        url : 'api/select-customer-info/'+id,
        dataType : 'JSON',
        success : function (data) {
            $('#invoiceCustomerName').text(data.first_name+' '+data.last_name);
            $('#customerId').val(data.id);
            $('#invoiceCustomerPhoneNumber').text(data.phone_number);
            $('#invoiceCustomerEmailAddress').text(data.email_address);
            $('#invoiceCustomerAddress').text(data.address);
        }
    });

    $('#customerDetails').css('display', 'block');
    $('#changeCustomer').css('display', 'block');
    $('#invoiceCustomer').css('display', 'none');
}

$('#changeCustomer').click(function () {
    event.preventDefault();

    $('#invoiceCustomerName').text(' ');
    $('#customerId').val(' ');
    $('#invoiceCustomerPhoneNumber').text(' ');
    $('#invoiceCustomerEmailAddress').text(' ');
    $('#invoiceCustomerAddress').text(' ');

    $('#customerDetails').css('display', 'none');
    $('#changeCustomer').css('display', 'none');
    $('#invoiceCustomer').css('display', 'block');
});

var max_fields = 30;
var x = 0;
function selectProductInfo(id) {
    if(x <= max_fields) {
        x++;
        $.ajax({
            method : "GET",
            url : 'api/select-invoice-product-info/'+id,
            dataType : 'JSON',
            success : function (data) {
                if(data.product_description == null) {
                    data.product_description = ' ';
                }
                $('#productTable').append(
                    '<tr>'+
                    '<td>'+
                    '<input type="text" name="invoice_item['+x+'][item_name]" value="'+data.product_name+'" readonly class="form-control"/>'+
                    '<input type="hidden" name="invoice_item['+x+'][item_id]" value="'+data.id+'"/>'+
                    '</td>'+
                    '<td>'+
                    '<input type="text" name="invoice_item['+x+'][item_description]" value="'+data.product_description+'" onclick="showDescriptionDetail()" class="form-control">'+
                    '</td>'+
                    '<td>'+
                    '<input type="number" id=qty'+x+' name="invoice_item['+x+'][item_quantity]" onkeyup="updateInvoiceProductTotalPrice('+x+')" value="1" class="form-control">'+
                    '</td>'+
                    '<td>'+
                    '<input type="text" id=price'+x+' name="invoice_item['+x+'][item_price]" onkeyup="updateInvoiceProductTotalPrice('+x+')" value="'+data.product_price+'" class="form-control">'+
                    '</td>'+
                    '<td class="invoice-total-price" id='+x+'>'+data.product_price+'</td>'+
                    '<td id=invoiceProduct'+x+'>'+
                    '<div class="d-flex justify-content-between">'+
                    '<a href="javascript:void(0);" title="Delete" class="btn btn-danger btn-rounded btn-xs p-l-10 p-r-8 p-t-3 p-b-1"><i class="fa fa-12 fa-trash-o" onclick="invoiceColumnRemove('+x+')"></i></a>'+
                    '</div>'+
                    '</td>'+
                    '</tr>'
                );
                calculateTotalInvoicePrice();
                $('#invoiceProductSelect').val('demo');
            }
        });
    }
}

function showDescriptionDetail() {
    alert('Description updated!');
}

function invoiceColumnRemove(id) {
    event.preventDefault();
    $('#invoiceProduct'+id).parent('tr').remove();
    calculateTotalInvoicePrice();
}

function updateInvoiceProductTotalPrice(id) {
    var newQty = $('#qty'+id).val();
    var newPrice = $('#price'+id).val();
    var newResult = Number(newPrice) * Number(newQty);
    $('#'+id).html(newResult);

    calculateTotalInvoicePrice();
}


function calculateTotalInvoicePrice() {
    var sum = 0;
    var totalPriceList = document.getElementsByClassName('invoice-total-price');
    for (var i=0; i<=totalPriceList.length-1; i++) {
        sum += Number(totalPriceList[i].innerHTML);
    }
    $('#invoiceTotalPrice').val(sum);
}


$('#editInvoiceCustomer').css('display', 'none');

$('#editChangeCustomer').click(function () {
    event.preventDefault();
    var customerId = $('#invoiceCustomerId').val();
    var invoiceId = $('#invoiceId').val();

    $.ajax({
        method : "GET",
        url : '../api/check-customer-invoice/'+customerId+'/'+invoiceId,
        dataType : 'JSON',
        success : function (data) {
            if(data == 1) {
                alert('Sorry you can not change this customer form this bill. Some payment was done for this customer!');
            } else {
                $('#invoiceCustomerName').text(' ');
                $('#invoiceCustomerId').val(' ');
                $('#invoiceCustomerPhoneNumber').text(' ');
                $('#invoiceCustomerEmailAddress').text(' ');
                $('#invoiceCustomerAddress').text(' ');

                $('#editCustomerDetails').css('display', 'none');
                $('#editChangeCustomer').css('display', 'none');
                $('#editInvoiceCustomer').css('display', 'block');
            }
        }
    });
});

function selectEditCustomerInfo(id) {
    $.ajax({
        method : "GET",
        url : '../api/select-customer-info/'+id,
        dataType : 'JSON',
        success : function (data) {
            $('#invoiceCustomerName').text(data.first_name+' '+data.last_name);
            $('#invoiceCustomerId').val(data.id);
            $('#invoiceCustomerPhoneNumber').text(data.phone_number);
            $('#invoiceCustomerEmailAddress').text(data.email_address);
            $('#invoiceCustomerAddress').text(data.address);
        }
    });

    $('#editCustomerDetails').css('display', 'block');
    $('#editChangeCustomer').css('display', 'block');
    $('#editInvoiceCustomer').css('display', 'none');
}


function updateEditInvoiceProductTotalPrice(id) {
    var newQty = $('#qty'+id).val();
    var newPrice = $('#price'+id).val();
    var newResult = Number(newPrice) * Number(newQty);
    $('#res'+id).html(newResult);

    calculateEditTotalInvoicePrice();
}

/*function InvoiceEditColumRemove(id) {
    event.preventDefault();
    $('#product'+id).parent('tr').remove();
    calculateEditTotalInvoicePrice();
}*/

function calculateEditTotalInvoicePrice() {
    var sum = 0;
    var totalPriceList = document.getElementsByClassName('invoice-total-price');
    for (var i=0; i<=totalPriceList.length-1; i++) {
        sum += Number(totalPriceList[i].innerHTML);
    }
    $('#editInvoiceTotalPrice').val(sum);
}

var editInvoiceMaxFields = 20;
var i = $('#editInvoiceIndexNo').val()-1;
function selectEditInvoiceProductInfo(id) {
    if(i <= editInvoiceMaxFields) {
        i++;
        $.ajax({
            method : "GET",
            url : '../api/select-invoice-product-info/'+id,
            dataType : 'JSON',
            success : function (data) {
                if(data.product_description == null) {
                    data.product_description = ' ';
                }
                $('#invoiceProductTable').append(
                    '<tr>'+
                    '<td>'+
                    '<input type="text" name="invoice_item['+i+'][item_name]" value="'+data.product_name+'" readonly class="form-control"/>'+
                    '<input type="hidden" name="invoice_item['+i+'][item_id]" value="'+data.id+'"/>'+
                    '</td>'+
                    '<td>'+
                    '<input type="text" name="invoice_item['+i+'][item_description]" value="'+data.product_description+'" class="form-control">'+
                    '</td>'+
                    '<td>'+
                    '<input type="number" id=qty'+i+' name="invoice_item['+i+'][item_quantity]" onkeyup="updateEditInvoiceProductTotalPrice('+i+')" value="1" class="form-control">'+
                    '</td>'+
                    '<td>'+
                    '<input type="text" id=price'+i+' name="invoice_item['+i+'][item_price]" onkeyup="updateEditInvoiceProductTotalPrice('+i+')" value="'+data.product_price+'" class="form-control">'+
                    '</td>'+
                    '<td class="invoice-total-price" id="res'+i+'">'+data.product_price+'</td>'+
                    '<td id=invoiceProduct'+i+'>'+
                    '<div class="d-flex justify-content-between">'+
                    '<a href="javascript:void(0);" title="Delete" class="btn btn-danger btn-rounded btn-xs p-l-10 p-r-10 p-t-3 p-b-1" onclick="invoiceColumnRemove('+i+')"><i class="fa fa-12 fa-trash-o"></i></a>'+
                    '</div>'+
                    '</td>'+
                    '</tr>'
                );
                calculateEditTotalInvoicePrice();
                $('#invoiceProductSelect').val('demo');
            }
        });
    }
}

$('.delete-edit-invoice').click(function () {
    var check = confirm('Are you sure to delete this!!!');
    if(check) {
        var editInvoiceDetailsId = $(this).attr('id');
        var invoiceId = $('#invoiceId').val();
        $.ajax({
            method : "POST",
            url : '../api/delete-invoice-details-info',
            dataType : 'JSON',
            data : {
                _token      : $('input[name="_token"]').val(),
                editInvoiceDetailsId    : editInvoiceDetailsId,
            },
            success : function (data) {
                alert(data);
                window.location = "/account-app-ela/public/edit-invoice/"+invoiceId;
            }
        });
    } else {
        return false;
    }
    return false;
});

$('.delete-invoice').click(function () {
    var check = confirm('Are you sure to delete this!!!');
    if(check) {
        var invoiceId = $(this).attr('id');
        $.ajax({
            method : "POST",
            url : 'api/delete-invoice-info',
            dataType : 'JSON',
            data : {
                _token      : $('input[name="_token"]').val(),
                invoiceId   : invoiceId,
            },
            success : function (data) {
                alert(data);
                window.location = "/account-app-ela/public/invoice-info";
            }
        });
    } else {
        return false;
    }
    return false;
});


/*===============invoice===================*/



/*===============bill===================*/


function selectVendorInfo(id) {
    $.ajax({
        method : "GET",
        url : 'api/select-vendor-info/'+id,
        dataType : 'JSON',
        success : function (data) {
            $('#billVendorName').text(data.vendor_name);
            $('#billVendorId').val(data.id);
            $('#billVendorPhoneNumber').text(data.phone_number);
            $('#billVendorEmailAddress').text(data.email_address);
            $('#billVendorAddress').text(data.address);
        }
    });

    $('#billDetails').css('display', 'block');
    $('#changeVendor').css('display', 'block');
    $('#billVendor').css('display', 'none');
}


$('#changeVendor').click(function () {
    event.preventDefault();

    $('#billVendorName').text(' ');
    $('#billVendorId').val(' ');
    $('#billVendorPhoneNumber').text(' ');
    $('#billVendorEmailAddress').text(' ');
    $('#billVendorAddress').text(' ');

    $('#billDetails').css('display', 'none');
    $('#changeVendor').css('display', 'none');
    $('#billVendor').css('display', 'block');
});


$('#editBillVendor').css('display', 'none');


$('#editChangeVendor').click(function () {
    event.preventDefault();
    var vendorId = $('#billVendorId').val();
    var billId = $('#billId').val();
    $.ajax({
        method : "GET",
        url : '../api/check-vendor-bill/'+vendorId+'/'+billId,
        dataType : 'JSON',
        success : function (data) {
            if(data == 1) {
                alert('Sorry you can not change this vendor form this bill. Some payment was done for this vendor');
            } else {
                $('#billVendorName').text(' ');
                $('#billVendorId').val(' ');
                $('#billVendorPhoneNumber').text(' ');
                $('#billVendorEmailAddress').text(' ');
                $('#billVendorAddress').text(' ');

                $('#editBillDetails').css('display', 'none');
                $('#editChangeVendor').css('display', 'none');
                $('#editBillVendor').css('display', 'block');
            }
        }
    });
});

function selectEditVendorInfo(id) {
    $.ajax({
        method : "GET",
        url : '../api/select-vendor-info/'+id,
        dataType : 'JSON',
        success : function (data) {
            $('#billVendorName').text(data.vendor_name);
            $('#billVendorId').val(data.id);
            $('#billVendorPhoneNumber').text(data.phone_number);
            $('#billVendorEmailAddress').text(data.email_address);
            $('#billVendorAddress').text(data.address);
        }
    });

    $('#editBillDetails').css('display', 'block');
    $('#editChangeVendor').css('display', 'block');
    $('#editBillVendor').css('display', 'none');
}


var billMaxFields = 10;
var y = 0;
function selectBillProductInfo(id) {
    if(y <= billMaxFields) {
        y++;
        $.ajax({
            method : "GET",
            url : 'api/select-bill-product-info/'+id,
            dataType : 'JSON',
            success : function (data) {
                if(data.product_description == null) {
                    data.product_description = ' ';
                }
                $('#billProductTable').append(
                    '<tr>'+
                    '<td>'+
                    '<input type="text" name="bill_item['+y+'][item_name]" value="'+data.product_name+'" readonly class="form-control"/>'+
                    '<input type="hidden" name="bill_item['+y+'][item_id]" value="'+data.id+'"/>'+
                    '</td>'+
                    '<td>'+
                    '<input type="text" name="bill_item['+y+'][item_description]" value="'+data.product_description+'" class="form-control">'+
                    '</td>'+
                    '<td>'+
                    '<input type="number" id=qty'+y+' name="bill_item['+y+'][item_quantity]" onkeyup="updateBillProductTotalPrice('+y+')" value="1" class="form-control">'+
                    '</td>'+
                    '<td>'+
                    '<input type="text" id=price'+y+' name="bill_item['+y+'][item_price]" onkeyup="updateBillProductTotalPrice('+y+')" value="'+data.product_price+'" class="form-control">'+
                    '</td>'+
                    '<td class="bill-total-price" id='+y+'>'+data.product_price+'</td>'+
                    '<td id=billProduct'+y+'>'+
                    '<div class="d-flex justify-content-between">'+
                    '<a href="javascript:void(0);" title="Delete" class="btn btn-danger btn-rounded btn-xs p-l-10 p-r-8 p-t-3 p-b-1"><i class="fa fa-12 fa-trash-o" onclick="billColumnRemove('+y+')"></i></a>'+
                    '</div>'+
                    '</td>'+
                    '</tr>'
                );
                calculateTotalBillPrice();
                $('#billProductSelect').val('demo');
            }
        });
    }
}

function billColumnRemove(id) {
    event.preventDefault();
    $('#billProduct'+id).parent('tr').remove();

    calculateTotalBillPrice();
}

function updateBillProductTotalPrice(id) {
    var newQty = $('#qty'+id).val();
    var newPrice = $('#price'+id).val();
    var newResult = Number(newPrice) * Number(newQty);
    $('#'+id).html(newResult);

    calculateTotalBillPrice();
}

function calculateTotalBillPrice() {
    var sum = 0;
    var totalPriceList = document.getElementsByClassName('bill-total-price');
    for (var i=0; i<=totalPriceList.length-1; i++) {
        sum += Number(totalPriceList[i].innerHTML);
    }
    $('#billTotalPrice').val(sum);
}

function updateEditBillProductTotalPrice(id) {
    var newQty = $('#qty'+id).val();
    var newPrice = $('#price'+id).val();
    var newResult = Number(newPrice) * Number(newQty);
    $('#res'+id).html(newResult);

    calculateEditTotalBillPrice();
}

function billEditColumRemove(id) {
    event.preventDefault();
    $('#'+id).parent('tr').remove();
    calculateEditTotalBillPrice();
}

function calculateEditTotalBillPrice() {
    var sum = 0;
    var totalPriceList = document.getElementsByClassName('bill-total-price');
    for (var i=0; i<=totalPriceList.length-1; i++) {
        sum += Number(totalPriceList[i].innerHTML);
    }
    $('#editBillTotalPrice').val(sum);
}


var editBillMaxFields = 20;
var z = $('#editBillIndexNo').val()-1;
function selectEditBillProductInfo(id) {
    if(z <= editBillMaxFields) {
        z++;
        $.ajax({
            method : "GET",
            url : '../api/select-bill-product-info/'+id,
            dataType : 'JSON',
            success : function (data) {
                if(data.product_description == null) {
                    data.product_description = ' ';
                }
                $('#billProductTable').append(
                    '<tr>'+
                    '<td>'+
                    '<input type="text" name="bill_item['+z+'][item_name]" value="'+data.product_name+'" readonly class="form-control"/>'+
                    '<input type="hidden" name="bill_item['+z+'][item_id]" value="'+data.id+'"/>'+
                    '</td>'+
                    '<td>'+
                    '<input type="text" name="bill_item['+z+'][item_description]" value="'+data.product_description+'" class="form-control">'+
                    '</td>'+
                    '<td>'+
                    '<input type="number" id=qty'+z+' name="bill_item['+z+'][item_quantity]" onkeyup="updateBillProductTotalPrice('+z+')" value="1" class="form-control">'+
                    '</td>'+
                    '<td>'+
                    '<input type="text" id=price'+z+' name="bill_item['+z+'][item_price]" onkeyup="updateBillProductTotalPrice('+z+')" value="'+data.product_price+'" class="form-control">'+
                    '</td>'+
                    '<td class="bill-total-price" id='+z+'>'+data.product_price+'</td>'+
                    '<td id=billProduct'+z+'>'+
                    '<div class="d-flex justify-content-between">'+
                    '<a href="javascript:void(0);" title="Delete" class="btn btn-danger btn-rounded btn-xs p-l-10 p-r-8 p-t-3 p-b-1"><i class="fa fa-12 fa-trash-o" onclick="billColumnRemove('+z+')"></i></a>'+
                    '</div>'+
                    '</td>'+
                    '</tr>'
                );
                calculateEditTotalBillPrice();
                $('#billProductSelect').val('demo');
            }
        });
    }
}

$('.delete-edit-bill').click(function () {
    var check = confirm('Are you sure to delete this!!!');
    if(check) {
        var editBillDetailsId = $(this).attr('id');
        var billId = $('#billId').val();
        $.ajax({
            method : "POST",
            url : 'api/delete-bill-details-info',
            dataType : 'JSON',
            data : {
                _token      : $('input[name="_token"]').val(),
                editBillDetailsId    : editBillDetailsId,
            },
            success : function (data) {
                alert(data);
                window.location = "/account-app-ela/public/edit-bill/"+billId;
            }
        });
    } else {
        return false;
    }
    return false;
});



$('.delete-bill').click(function () {
    var check = confirm('Are you sure to delete this!!!');
    if(check) {
        var billId = $(this).attr('id');
        $.ajax({
            method : "POST",
            url : 'api/delete-bill-info',
            dataType : 'JSON',
            data : {
                _token      : $('input[name="_token"]').val(),
                billId    : billId,
            },
            success : function (data) {
                alert(data);
                window.location = "/account-app-ela/public/bill-info";
            }
        });
    } else {
        return false;
    }
    return false;
});


/*===============bill===================*/

/*===============vendor edit and delete===================*/

$('.edit-vendor').click(function () {
    var vendorId = $(this).attr('id');
    $.ajax({
        method : "GET",
        url : 'api/edit-vendor/'+vendorId,
        dataType : 'JSON',
        success : function (data) {
            $('#vendorName').val(data.vendor_name);
            $('#vendorId').val(data.id);
            $('#vendorEmail').val(data.email_address);
            $('#vendorPhone').val(data.phone_number);
            $('#vendorAddress').text(data.address);
            $('#vendorAccount').val(data.account_number);
        }
    });
    openModal('#editVendorModal')
    return false;
});


$('.delete-btn').click(function () {
    var check = confirm('Are you sure to delete this!!!');
    if(check) {
        var vendorId = $(this).attr('id');
        $.ajax({
            method : "POST",
            url : 'api/delete-vendor',
            dataType : 'JSON',
            data : {
                _token      : $('input[name="_token"]').val(),
                vendorId    : vendorId,
            },
            success : function (data) {
                alert(data);
                window.location = "/account-app-ela/public/vendor-info";
            }
        });
    } else {
        return false;
    }
});

/*===============vendor edit and delete===================*/

/*===============customer edit and delete===================*/

$('.edit-customer').click(function () {
    var customerId = $(this).attr('id');
    $.ajax({
        method : "GET",
        url : 'api/edit-customer/'+customerId,
        dataType : 'JSON',
        success : function (data) {
            $('#companyName').val(data.company_name);
            $('#firstName').val(data.first_name);
            $('#lastName').val(data.last_name);
            $('#customerId').val(data.id);
            $('#customerEmail').val(data.email_address);
            $('#customerPhone').val(data.phone_number);
            $('#customerAddress').text(data.address);
        }
    });
    openModal('#editCustomerModal');
    return false;
});


$('.delete-customer').click(function () {
    var check = confirm('Are you sure to delete this!!!');
    if(check) {
        var customerId = $(this).attr('id');
        $.ajax({
            method : "POST",
            url : 'api/delete-customer',
            dataType : 'JSON',
            data : {
                _token      : $('input[name="_token"]').val(),
                customerId    : customerId,
            },
            success : function (data) {
                alert(data);
                window.location = "/account-app-ela/public/customer-info";
            }
        });
    } else {
        return false;
    }
});

$('#addCustomerForm').submit(function () {
    var addCompanyName  = $('#addCompanyName').val();
    var addFirstName    = $('#addFirstName').val();

    if(addCompanyName.length >0 || addFirstName.length >0) {
        return true;
    } else {
        alert('Please give us the compnay name or first name');
        return false;
    }
});




/*===============customer edit and delete===================*/


/*===============product edit and delete===================*/

$('#editIncomeShowHide').css('display', 'none');
$('#editSellProduct').click(function () {
    if (this.checked) {
        $('#editIncomeShowHide').css('display', 'flex');
    } else {
        $('#editIncomeShowHide').css('display', 'none');
    }
});

$('#editExpenseShowHide').css('display', 'none');
$('#editBuyProduct').click(function () {
    if (this.checked) {
        $('#editExpenseShowHide').css('display', 'flex');
    } else {
        $('#editExpenseShowHide').css('display', 'none');
    }
});


function editProductWithAccount(productId) {
    $.ajax({
        method : "GET",
        url : '../api/product-info-by-id/'+productId,
        dataType : 'JSON',
        success : function (data) {
            $('#productName').val(data.product_name);
            $('#productId').val(data.id);
            $('#productDescription').text(data.product_description);
            $('#productPrice').val(data.product_price);

            $('#editSellProductDiv').css('display', 'flex');
            $('#editBuyProductDiv').css('display', 'flex');

            if(data.sell_status == 1 && data.buy_status == 1) {
                $('#editSellProduct').attr('checked', 'checked');
                $('#incomeAccountId').val(data.income_account_id);
                $('#editIncomeShowHide').css('display', 'flex');

                $('#editBuyProduct').attr('checked', 'checked');
                $('#expenseAccountId').val(data.expense_account_id);
                $('#editExpenseShowHide').css('display', 'flex');

            } else if (data.sell_status == 1) {

                $('#editSellProduct').attr('checked', 'checked');
                $('#incomeAccountId').val(data.income_account_id);
                $('#editIncomeShowHide').css('display', 'flex');

                $('#editBuyProduct').removeAttr('checked');
                $('#expenseAccountId').val('demo');
                $('#editExpenseShowHide').css('display', 'none');
            } else if(data.buy_status == 1) {

                $('#editBuyProduct').attr('checked', 'checked');
                $('#expenseAccountId').val(data.expense_account_id);
                $('#editExpenseShowHide').css('display', 'flex');

                $('#editSellProduct').removeAttr('checked');
                $('#incomeAccountId').val('demo');
                $('#editIncomeShowHide').css('display', 'none');
            }
        }
    });
}

function editProductWithoutAccount(productId) {
    $.ajax({
        method : "GET",
        url : '../api/product-info-by-id/'+productId,
        dataType : 'JSON',
        success : function (data) {
            $('#productName').val(data.product_name);
            $('#productId').val(data.id);
            $('#productDescription').text(data.product_description);
            $('#productPrice').val(data.product_price);

            $('#editSellProduct').removeAttr('checked');
            $('#editBuyProduct').removeAttr('checked');

            $('#expenseAccountId').val('demo');
            $('#incomeAccountId').val('demo');

            $('#editSellProductDiv').css('display', 'none');
            $('#editBuyProductDiv').css('display', 'none');
            $('#editIncomeShowHide').css('display', 'none');
            $('#editExpenseShowHide').css('display', 'none');
        }
    });
}

$('#incomeAccountId').change(function () {
    //alert('test');
    $('#editSellProduct').attr('checked', 'checked');
});

$('#expenseAccountId').change(function () {
    //alert('test');
    $('#editBuyProduct').attr('checked', 'checked');
});

$('.edit-product').click(function () {
    var productId = $(this).attr('id');
    $.ajax({
        method : "GET",
        url : '../api/product-invoice-bill-status/'+productId,
        dataType : 'JSON',
        data : {},
        success : function (data) {
            if(data == 1) {
              editProductWithAccount(productId);
            } else {
              editProductWithoutAccount(productId);
            }
        }
    });
    openModal('#editProductModal');
    return false;
});

$('.delete-product').click(function () {
    var check = confirm('Are you sure to delete this!!!');
    if(check) {
        var productId = $(this).attr('id');
        $.ajax({
            method   : "POST",
            url      : '../api/delete-product',
            dataType : 'JSON',
            data     : {
                _token      : $('input[name="_token"]').val(),
                productId   : productId,
            },
            success  : function (data) {
                alert(data);
                // window.location = "/account-app-ela/public/product-info";
                window.location.reload();
            }
        });
    } else {
        return false;
    }
});

/*===============product edit and delete===================*/

/*===============Invoice Form Submit Validation ===================*/

$('#createInvoiceForm').submit(function () {
    var customerId = $('#customerId').val();
    var invoiceTotalPrice = $('#invoiceTotalPrice').val();
    if(customerId && invoiceTotalPrice != 0) {
        return true;
    } else {
        alert('Please give the information about customer & product info');
        return false;
    }
});

$('.invoice-payment').click(function () {
    var invoiceId = $(this).attr('id');

    $.ajax({
        method : "GET",
        url : 'api/select-invoice-info/'+invoiceId,
        dataType : 'JSON',
        success : function (data) {
            $('#invoicePaymentAmount').val(data.invoice_total_price - data.paid_amount);
            $('#invoicePaymentId').val(data.id);
        }
    });

    openModal('#invoicePaymentModal');
    return false;
});

$('.bill-payment').click(function () {
    var billId = $(this).attr('id');

    $.ajax({
        method : "GET",
        url : 'api/select-bill-info/'+billId,
        dataType : 'JSON',
        success : function (data) {
            $('#billPaymentAmount').val(data.bill_total_price - data.paid_amount);
            $('#billPaymentId').val(data.id);
        }
    });

    openModal('#billPaymentModal');
    return false;
});

/* ============ view voucher details =============== */

$('.view-voucher-detail').click(function () {
    event.preventDefault();
    var voucherId = $(this).attr('id');
    $.ajax({
        method : "GET",
        url : 'api/select-voucher-info/'+voucherId,
        dataType : 'JSON',
        success : function (data) {
            $('#voucherResult').empty();
            for (var i=0; i<=Object.keys(data).length-1; i++) {
                $('#voucherResult').append('' +
                    '<tr>'+
                    '<td>'+data[i].account_code+'</td>'+
                    '<td>'+data[i].description+'</td>'+
                    '<td>'+data[i].credit+'</td>'+
                    '<td>'+data[i].debit+'</td>'+
                    '</tr>'
                );
            }
        }
    });

    $('#voucherNoRes').text(voucherId);
    openModal('#viewVoucherDetailModal');
});


/* ============ view voucher details =============== */
