

<!DOCTYPE html>
<html>
<head>
    <title></title>

    <style type="text/css">
        body {
            color: #000033;
            font-family: "verdana", "sans-serif";
            margin: 0px;
            padding-top: 0px;
            font-size: 0.8em;
            height: 100%;
            position: relative;
            padding-bottom: 150px
        }

        .colHead {
            font-weight: bold;
            padding-top: 15px;
        }

        /* Footer
 -----------------------------------------------------------------------*/
        #footer {
            color: #FFFFff;
            border-top: 1px solid #000033;
        }

        #copyright {
            padding: 5px;
            font-size: 0.6em;
            background-color: #114C8D;
        }

        #footer_spacer_row {
            border-spacing: 0;
            width: 100%;
        }
        .footertwo {
            position: absolute;
            left: 0px; bottom: 0; right: 0px; height: 150px;
            background: url("{{ public_path() . '/pdf/pdf-footer.jpg' }}");
        }

        #footer_spacer_row td {
            padding: 0px;
            border-bottom: 1px solid #000033;
            background-color: #F7CF07;
            height: 2px;
            font-size: 2px;
            line-height: 2px;
        }

        .logo-text {
            display: inline-block;
            margin-left: 64px;
            color: #f3f3f3;
            font-size: 21px;
        }

        .iban-header {
            color: #f3f3f3;
            margin: 20px 0 0 12px;
            font-size: 11px;
        }
        .footertwo p:first-child
        {
            color: #F3F3F3;
            width: 80%;
            margin: 90px auto 0 auto;
        }
        .footertwo p span
        {
            color: #F3F3F3 !important;
        }

        h1,h2,h3,h4,h5,h6 {
            color: #1d2590;
        }

        .content {
            width: 80%;
            margin: 0 10%;
        }
    </style>
</head>
<body>

<div style="background: url('{{ public_path() .'/pdf/pdf-header.jpg' }}'); min-height: 225px;background-size: contain;background-repeat: no-repeat;">

    <div class="logo-text">
        <span class="logo-top-text">Uw</span> <br>
        <span class="logo-top-text">Voordeel</span>
    </div>
    <br>
    <table class="iban-header">
        <tr>
            <td>IBAN</td>
            <td>NL91 ABNA 0417 1643 00</td>
        </tr>
        <tr>
            <td>BTW</td>
            <td>855755659B01</td>
        </tr>
        <tr>
            <td>KVK</td>
            <td>0417 1643 00</td>
        </tr>
    </table>

</div>



<div class="content">

    <table class="detail" style="margin: 0px; border-top: none;">
        <tr>
            <td class="label">Restaurant:</td>
            <td class="field">{{ $company['name'] }}</td>
            <td class="label">Factuurnummer:</td>
            <td class="field">{{ $invoiceNumber }}</td>
        </tr>
        <tr>
            <td class="label"></td>
            <td class="field">{{ $company['address'] }}</td>
            <td class="label">Factuurdatum:</td>
            <td class="field">{{ date('d-m-Y', strtotime($invoiceDate['startDate'])) }}</td>
        </tr>
        <tr>
            <td class="label"></td>
            <td class="field">{{ $company['zipcode'] }} {{ $company['city'] }}</td>
            <td class="label">Verloopdatum:</td>
            <td class="field">{{ date('d-m-Y', strtotime($invoiceDate['expireDate'])) }}</td>
        </tr>
        <tr>
            <td class="label">IBAN</td>
            <td class="field">{{ $company['financial_iban'] }} t.n.v. {{ $company['financial_iban_tnv'] }}</td>
        </tr>
        <tr>
            <td class="label">BTW</td>
            <td class="field">{{ $company['btw'] }}</td>
        </tr>
        <tr>
            <td class="label">KVK</td>
            <td class="field">{{ $company['kvk'] }}</td>
        </tr>
    </table>

    @if ($type == 'products')
        @if (count($products) >= 1)
        <table class="list" style="width: 99%; margin-top: 1em;">
            <tr class="head">
                <td style="width: 13%">Omschrijving</td>
                <td style="width: 8%">Aantal</td>
                <td style="width: 8%">Prijs</td>
                <td style="width: 8%">BTW</td>
                <td style="width: 8%">BTW Bedrag</td>
                <td style="width: 5%">Totaal incl btw</td>
            </tr>
            <?php 
                $totalPriceExTax = $totalTax = $totalPrice = 0;
                
            ?>
            @foreach ($products as $product)
                <?php 
                if (isset($product->amount, $product->price, $product->tax)) {
                    $totalTax += (($product->amount * $product->price * $product->tax) / 100); 
                    $totalPriceExTax += $product->amount * $product->price; 
                    $totalPrice += $product->amount * $product->price * ($product->tax / 100 + 1); 
                }
                ?>
                @if (isset($product->description) && isset($product->price) && trim($product->price) != '')
                <tr class="list_row">
                    @if (isset($product->description))
                    <td>{{ $product->description }}</td>
                    @endif
                    
                    @if (isset($product->amount))
                    <td>{{ $product->amount }}</td>
                    @endif

                    @if (isset($product->price))
                    <td>&euro;{{ $company['debit_credit'] == 'credit' ? '-' : '' }}{{ $product->price }}</td>
                    @endif

                    @if (isset($product->tax))
                    <td>{{ $product->tax }}%</td>
                    @endif
                    @if (isset($product->amount, $product->price, $product->tax))
                    <td>&euro;{{ ($product->amount * $product->price * $product->tax) / 100 }}</td>
                    @endif
                    
                    @if (isset($product->amount, $product->price, $product->tax))
                    <td>&euro;{{ $company['debit_credit']  == 'credit' ? '-' : '' }}{{ $product->amount * $product->price * ($product->tax / 100 + 1)  }}</td>
                    @endif
                </tr>
                @endif
            @endforeach
        </table>
        @endif

        <table class="list" style="width: 99%; margin-top: 1em;">
            <tr class="list_row">
                <td style="width: 70%"></td>
                <td style="width: 20%"><strong>Totaal excl btw</strong></td>
                <td style="width: 20%">&euro;{{ $company['debit_credit']  == 'credit' ? '-' : '' }}{{ number_format($totalPriceExTax, 2, ',', ' ') }}</td>
            </tr>

            <tr class="list_row">
                <td style="width: 70%"></td>
                <td style="width: 20%"><strong>Totaal btw</strong></td>                
                <td style="width: 20%">&euro;{{ number_format($totalTax, 2, ',', ' ') }}</td>
            </tr>

            <tr class="list_row">
                <td style="width: 70%"></td>
                <td style="width: 20%"><strong>Totaal incl btw</strong></td>
                <td style="width: 20%">&euro;{{ $company['debit_credit']  == 'credit' ? '-' : '' }}{{ number_format($totalPrice, 2, ',', ' ') }}</td>
            </tr>
        </table>
    @elseif ($type == 'reservation')
        <table class="list" style="width: 99%; margin-top: 1em;">
            <tr class="head">
                  <td style="width: 13%">Te betalen</td>
                  <td style="width: 8%">Aantal</td>
                  <td style="width: 8%">Prijs</td>
                  <td style="width: 8%">BTW</td>
                  <td style="width: 5%">Totaal incl btw</td>
              </tr>
              <tr class="list_row red" style="color: red;">
                  <td>{{ $totalPersons }} gasten x €1.00 excl 21% per gast</td>
                  <td>{{ $totalPersons }}</td>
                  <td>&euro;1,00</td>
                  <td>21%</td>
                  <td>&euro;{{ number_format(($totalPersons * 1 * 1.21), 2, ',', ' ') }}</td>
              </tr>
        </table>

        <table class="list" style="width: 99%; margin-top: 1em;">
            <tr class="head">
                  <td style="width: 13%">Te ontvangen</td>
                  <td style="width: 5%">Totaal</td>
              </tr>
              <tr class="list_row red" style="color: green;">
                  <td>Spaartegoed waar u recht op heeft, met verlegde btw</td>
                  <td>&euro;{{ number_format($totalSaldo, 2, ',', ' ') }}</td>
              </tr>
        </table>
    @endif
</div>

<div class="footertwo">
    {!! isset($contentBlock[46]) ? $contentBlock[46] : '' !!}
</div>
</body>
</html>