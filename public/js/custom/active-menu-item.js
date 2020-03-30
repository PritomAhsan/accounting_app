$(document).ready(function () {
    currentUrl = window.location.href;
    if(currentUrl.match('add-journal-transaction')) {
        journalTransaction = $('#sidebarnav li.journal-transaction');
        journalTransaction.addClass('active');
        journalTransaction.parent().addClass('in');
        journalTransaction.parent().parent().addClass('active');
        journalTransaction.parent().parent().parent().addClass('in');
        journalTransaction.parent().parent().parent().parent().addClass('active');
    } else if(currentUrl.match('create-invoice')) {
        invoice = $('#sidebarnav li.invoice');
        invoice.addClass('active');
        invoice.parent().addClass('in');
        invoice.parent().parent().addClass('active');
    } else if(currentUrl.match('edit-invoice')) {
        invoice = $('#sidebarnav li.invoice');
        invoice.addClass('active');
        invoice.parent().addClass('in');
        invoice.parent().parent().addClass('active');
    } else if(currentUrl.match('create-bill')) {
        bill = $('#sidebarnav li.bill');
        bill.addClass('active');
        bill.parent().addClass('in');
        bill.parent().parent().addClass('active');
    } else if(currentUrl.match('edit-bill')) {
        bill = $('#sidebarnav li.bill');
        bill.addClass('active');
        bill.parent().addClass('in');
        bill.parent().parent().addClass('active');
    }
});
