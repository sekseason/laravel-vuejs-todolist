@extends('layouts.app')

@section('content')
<div class="test-ntt">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="panel panel-default">
                    <div class="panel-heading">
                      ทดสอบ NTT Data
                    </div>

                    <div class="panel-body">
                      <form>
                        <h4>Simple Payment Request</h4>
                        <small>url: <code>https://sandbox2.nttdpay.com/PaymentPages/PaymentRequestPayment2</code></small>
                        <br/><br/>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Login</label>
                                <input type="text" class="form-control" placeholder="Login" v-model.trim="request.login" required>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Password</label>
                                <input type="text" class="form-control" placeholder="Password" v-model.trim="request.pass" required>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Amount</label>
                                <input type="number" class="form-control" placeholder="Amount" v-model.trim="request.amt" required>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Currency</label>
                                <input type="text" class="form-control" placeholder="Currency" v-model.trim="request.txncurr" required>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Transaction ID</label>
                                <input type="number" class="form-control" placeholder="Transaction ID" v-model.trim="request.txnid" required>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Date</label>
                                <input type="text" class="form-control" placeholder="Date" v-model.trim="request.date" required>
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <label>Return Url</label>
                            <input type="text" class="form-control" placeholder="Return Url" v-model.trim="request.ru" required>
                        </div>

                        <div class="form-group">
                          <label>Order description</label>
                            <input type="text" class="form-control" placeholder="Order description" v-model.trim="request.od" required>
                        </div>

                        <div class="form-group">
                          <label>Remarks</label>
                            <input type="text" class="form-control" placeholder="Remarks" v-model.trim="request.remarks" required>
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Customer</label>
                                <input type="text" class="form-control" placeholder="Customer" v-model.trim="request.customername" required>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Email</label>
                                <input type="email" class="form-control" placeholder="Email" v-model.trim="request.emailid" required>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Mobile</label>
                                <input type="text" class="form-control" placeholder="Mobile" v-model.trim="request.mobile" required>
                            </div>
                          </div>
                          <div class="col-md-8">
                            <div class="form-group">
                              <label>Billing Address</label>
                                <input type="text" class="form-control" placeholder="Billing Address" v-model.trim="request.billingaddress" required>
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <label>Signature</label>
                            <input type="text" class="form-control" placeholder="Signature" v-model.trim="request.signature" required>
                        </div>

                        <div class="text-right">
                          <button type="button" class="btn btn-default" v-on:click.prevent="reset">
                            <i class="fa fa-refresh"></i>
                            Reset
                          </button>
                          <button type="submit" class="btn btn-success" v-on:click.prevent.stop="send">
                            <i class="fa fa-send"></i>
                            Send
                          </button>
                        </div>
                      </form>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
              <h4>Request:</h4>
              <pre>@{{ request }}</pre>

              <h4>Response:</h4>
              <pre>@{{ response }}</pre>
        </div>
    </div>
</div>
@endsection
