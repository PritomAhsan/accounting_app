<!DOCTYPE html>

<html>
<head>
    <title></title>
</head>
<body>
<table align="center" role="presentation" cellspacing="0" cellpadding="0"  width="500" border="0" style="margin: 0 auto;">
    <tr>
        <td style="font-family: sans-serif; text-align: center; color: #555;">
            <h1 style="text-transform: uppercase; font-size: 18px; line-height: 18px; margin: 5px;">Company Name</h1>

            <div style="font-size: 10px; line-height: 10px;">
                DBBL Bhaban, 3rd Floor (West) <br>
                12 Kawran Bazar <br>
                Dhaka 1215 <br>
                Bangladesh <br>
            </div>
        </td>
    </tr>
    <tr>
        <td style="padding-top: 10px;">
            <h2 style="margin: 0; font-family: sans-serif; color: #555; font-size: 12px; line-height: 12px; font-weight: bold; float: right; display: block; text-transform: uppercase;">{{ $voucher->voucher_type }}</h2>
        </td>
    </tr>
    <tr>
        <td style="padding-top: 8px;">
            <hr style="border: 0.005em solid #ddd;">
        </td>
    </tr>
    <tr>
        <td>
            <div style="font-family: sans-serif; font-size: 10px; line-height: 12px; color: #555; text-align: right;">
                <strong>Date: </strong> {{ $voucher->voucher_date }} <br>
                <strong>Voucher No:</strong> {{ $voucher->id }} <br>
            </div>
        </td>
    </tr>
    <tr>
        <td style="background-color: #ffffff; padding-top: 10px;">
            <table style="border-collapse: collapse !important; border-spacing: 0.005em !important; table-layout: auto !important; width: 100%; font-family: sans-serif; font-size: 10px; line-height: 10px; color: #555;">
                <tr style="background-color: #fdb515;">
                    <th style="text-align: left; padding: 5px; border: 0.005em solid #ddd;">SL</th>
                    <th style="text-align: left; padding: 5px; border: 0.005em solid #ddd;">Account Code</th>
                    <th style="text-align: left; padding: 5px; border: 0.005em solid #ddd; width: 50%;">Description</th>
                    <th style="text-align: left; padding: 5px; border: 0.005em solid #ddd;">Debit (TK.)</th>
                    <th style="text-align: left; padding: 5px; border: 0.005em solid #ddd;">Credit (TK.)</th>
                </tr>
                @php($i=1)
                @php($totalDebit = 0)
                @php($totalCredit = 0)
                @foreach($vouchers as $voucher)
                    <tr>
                        <td style="text-align: left; padding: 5px; border: 0.005em solid #ddd;">{{ $i++ }}</td>
                        <td style="text-align: left; padding: 5px; border: 0.005em solid #ddd;">{{ $voucher->account_code }}</td>
                        <td style="text-align: left; padding: 5px; border: 0.005em solid #ddd; width: 50%;">{{ $voucher->description }}</td>
                        <td style="text-align: left; padding: 5px; border: 0.005em solid #ddd;">{{ $voucher->debit }}</td>
                        <td style="text-align: left; padding: 5px; border: 0.005em solid #ddd;">{{ $voucher->credit }}</td>
                    </tr>
                    @php($totalDebit = $totalDebit+$voucher->debit)
                    @php($totalCredit = $totalCredit + $voucher->credit)
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td style="text-align: right; padding: 5px;">Total (TK.): </td>
                    <td style="text-align: left; padding: 5px; border: 0.005em solid #ddd;">{{ $totalDebit }}</td>
                    <td style="text-align: left; padding: 5px; border: 0.005em solid #ddd;">{{ $totalCredit }}</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: 30px auto 0 !important; font-family: sans-serif; font-size: 10px; line-height: 15px; color: #555555;">
                <tr>
                    <td style="text-align: center;"><hr style="margin: 0.2em auto; border: 0.00005em solid #b0b0b0; width: 70%;">Signature</td>
                    <td style="text-align: center;"><hr style="margin: 0.2em auto; border: 0.00005em solid #b0b0b0; width: 70%;">Signature</td>
                    <td style="text-align: center;"><hr style="margin: 0.2em auto; border: 0.00005em solid #b0b0b0; width: 70%;">Signature</td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>