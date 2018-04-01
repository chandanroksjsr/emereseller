@extends('layouts.app')

@section('content')













<script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>










                  <!-- Content Header (Page header) -->
                  <section class="content-header">
                    <h1>
                      Invoice
                      <small>#00{{ $invoice['id'] }}</small>
                    </h1>

                    <ol class="breadcrumb">
      <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{route('invoice.all')}}">Invoices</a></li>
      <li class="active">#0{{$invoice['id']}}</li>
      </ol>
                  </section>


                  <!-- Main content -->
                  <section class="invoice" id="inv">
                    <!-- title row -->
                    <div class="row">
                      <div class="col-xs-12">
                        <h2 class="page-header">
                           <img src="{{asset('images/logoem.png')}}" width="150px">
                          <small class="pull-right">Date: {{ date('d-M-Y', strtotime( $invoice['order_time'] )) }}</small>
                        </h2>

                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                      <div class="col-sm-4 invoice-col">
                        From
                        <address>
                          <strong>SRI RAMA ENTERPRISES.</strong><br>
      G-12 DABC MITHLAM<br>
      SRIRAM NAGAR MAIN ROAD NOLAMBUR<br>
      CHENNAI 600095.<br>
                          Email: info@emerecard.com
                        </address>
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-4 invoice-col">
                        To
                        <address>
                          <strong>{{$invoice['recipent_name']}}</strong><br>
                          {{$invoice['door_no']}},<br>
                          {{$invoice['address']}}<br>
                          {{$invoice['city']}}, {{$invoice['state']}}, {{$invoice['pin']}}<br>
                          Phone: {{$invoice['recipent_phone']}}<br>

                        </address>
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-4 invoice-col">
                        <b>Invoice #00{{ $invoice['id'] }}</b><br>
                        <b>TxnId:</b> {{ $invoice['payutxn'] }}
                        <br>

                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                      <div class="col-xs-12 table-responsive">
                        <table class="table table-striped">
                          <thead>
                          <tr>
                            <th>Duration</th>
                            <th>Package</th>
                            <th>Serial #</th>
                            <!-- <th>Description</th> -->
                            <th>Subtotal</th>
                          </tr>
                          </thead>
                          <tbody>
                          <tr>
                            <td>1-Year</td>
                            <td>EmeReCard Standard Package</td>
                            <td>EP0{{ $invoice['plan'] }}</td>
                            <!-- <td>El snort testosterone trophy driving gloves handsome</td> -->
                            <td>₹ {{ $invoice['amount'] }}.00</td>
                          </tr>

                          </tbody>
                        </table>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                      <!-- accepted payments column -->
                      <div class="col-md-6 col-xs-12">
                        <p class="lead">Payment Methods:</p>
                        <img src="{{asset('images/insta.png')}}" style="max-width:350px;" alt="Visa">
                        <!-- <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                        <img src="../../dist/img/credit/american-express.png" alt="American Express">
                        <img src="../../dist/img/credit/paypal2.png" alt="Paypal"> -->

                        <!-- <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                          Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
                          dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                        </p> -->
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6 col-xs-12">
                        <p class="lead">Paid on {{ date('d-M-Y', strtotime( $invoice['order_time'] )) }}</p>

                        <div class="table-responsive">
                          <table class="table">
                            <tr>
                              <th style="width:50%">Subtotal:</th>
                              <td>₹ {{ $invoice['amount'] }}.00</td>
                            </tr>
                            <tr>
                              <th>Tax & Fee</th>
                              <td>₹ {{ $tax = (($invoice['amount']*2)/100)+3 }}</td>
                            </tr>
                            <tr>
                              <th>Shipping:</th>
                              <td>₹ 0.00</td>
                            </tr>
                            <tr>
                              <th>Total:</th>
                              <td>₹ {{$tax+$invoice['amount']}}</td>
                            </tr>
                          </table>
                        </div>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                      <div class="col-xs-12">
                        <!-- <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                        <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
                        </button> -->
                        <!-- <button type="button" class="btn btn-primary pull-right" id="dwinv"onclick="javascript:demoFromHTML();" style="margin-right: 5px;">
                          <i class="fa fa-download" ></i> Download PDF
                        </button> -->
                      </div>

                    </div>


                  </section>
                  <!-- /.content -->
                  <div class="clearfix"></div>




      <div id="editor"></div>

  <!-- <h3 class="page-title"><i class="fa fa-dashboard"></i> DASHBOARD</h3>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">SIGN UPS</div>

                <div class="panel-body">




                  <div id="temps_div"></div>


                @linechart('Temps', 'temps_div')
              </div>
            </div>
          </div>

                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">CARD SUBSCRIPTIONS</div>

                        <div class="panel-body">

                <div id="temps_div1"></div>


              @linechart('Temps1', 'temps_div1')


                </div>
            </div>
        </div>
    </div> -->





<script>


function demoFromHTML() {
    var pdf = new jsPDF('p', 'pt', 'letter');
    // source can be HTML-formatted string, or a reference
    // to an actual DOM element from which the text will be scraped.
    source = $('#invoice')[0];

    // we support special element handlers. Register them with jQuery-style
    // ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
    // There is no support for any other type of selectors
    // (class, of compound) at this time.
    specialElementHandlers = {
        // element with id of "bypass" - jQuery style selector
        '#editor': function (element, renderer) {
            // true = "handled elsewhere, bypass text extraction"
            return true
        }
    };
    margins = {
        top: 80,
        bottom: 60,
        left: 40,
        width: 522
    };
    // all coords and widths are in jsPDF instance's declared units
    // 'inches' in this case
    pdf.fromHTML(
    source, // HTML string or DOM elem ref.
    margins.left, // x coord
    margins.top, { // y coord
        'width': margins.width, // max width of content on PDF
        'elementHandlers': specialElementHandlers
    },

    function (dispose) {
        // dispose: object with X, Y of the last line add to the PDF
        //          this allow the insertion of new lines after html
        pdf.save('Test.pdf');
    }, margins);
}

</script>








@endsection
