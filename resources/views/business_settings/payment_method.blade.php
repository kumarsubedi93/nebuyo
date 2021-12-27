@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-6">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">{{translate('Paypal Credential')}}</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="{{ route('payment_method.update') }}" method="POST">
                        <input type="hidden" name="payment_method" value="paypal">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="types[]" value="PAYPAL_CLIENT_ID">
                            <div class="col-lg-3">
                                <label class="control-label">{{translate('Paypal Client Id')}}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="PAYPAL_CLIENT_ID" value="{{  env('PAYPAL_CLIENT_ID') }}" placeholder="{{ translate('Paypal Client ID') }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="types[]" value="PAYPAL_CLIENT_SECRET">
                            <div class="col-lg-3">
                                <label class="control-label">{{translate('Paypal Client Secret')}}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="PAYPAL_CLIENT_SECRET" value="{{  env('PAYPAL_CLIENT_SECRET') }}" placeholder="{{ translate('Paypal Client Secret') }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-3">
                                <label class="control-label">{{translate('Paypal Sandbox Mode')}}</label>
                            </div>
                            <div class="col-lg-6">
                                <label class="switch">
                                    <input value="1" name="paypal_sandbox" type="checkbox" @if (\App\BusinessSetting::where('type', 'paypal_sandbox')->first()->value == 1)
                                    checked
                                        @endif>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12 text-right">
                                <button class="btn btn-purple" type="submit">{{translate('Save')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">{{translate('Stripe Credential')}}</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="{{ route('payment_method.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="payment_method" value="stripe">
                        <div class="form-group">
                            <input type="hidden" name="types[]" value="STRIPE_KEY">
                            <div class="col-lg-3">
                                <label class="control-label">{{translate('Stripe Key')}}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="STRIPE_KEY" value="{{  env('STRIPE_KEY') }}" placeholder="{{ translate('STRIPE KEY') }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="types[]" value="STRIPE_SECRET">
                            <div class="col-lg-3">
                                <label class="control-label">{{translate('Stripe Secret')}}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="STRIPE_SECRET" value="{{  env('STRIPE_SECRET') }}" placeholder="{{ translate('STRIPE SECRET') }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12 text-right">
                                <button class="btn btn-purple" type="submit">{{translate('Save')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php
    /*
      <div class="col-lg-6">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title text-center">{{translate('Sslcommerz Credential')}}</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="{{ route('payment_method.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="payment_method" value="sslcommerz">
                    <div class="form-group">
                        <input type="hidden" name="types[]" value="SSLCZ_STORE_ID">
                        <div class="col-lg-3">
                            <label class="control-label">{{translate('Sslcz Store Id')}}</label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="SSLCZ_STORE_ID" value="{{  env('SSLCZ_STORE_ID') }}" placeholder="{{translate('Sslcz Store Id')}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="types[]" value="SSLCZ_STORE_PASSWD">
                        <div class="col-lg-3">
                            <label class="control-label">{{translate('Sslcz store password')}}</label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="SSLCZ_STORE_PASSWD" value="{{  env('SSLCZ_STORE_PASSWD') }}" placeholder="{{translate('Sslcz store password')}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-3">
                            <label class="control-label">{{translate('Sslcommerz Sandbox Mode')}}</label>
                        </div>
                        <div class="col-lg-6">
                            <label class="switch">
                                <input value="1" name="sslcommerz_sandbox" type="checkbox" @if (\App\BusinessSetting::where('type', 'sslcommerz_sandbox')->first()->value == 1)
                                checked
                                    @endif>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12 text-right">
                            <button class="btn btn-purple" type="submit">{{translate('Save')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<div class="col-lg-6">
  <div class="panel">
      <div class="panel-heading">
          <h3 class="panel-title text-center">{{translate('RazorPay Credential')}}</h3>
      </div>
      <div class="panel-body">
          <form class="form-horizontal" action="{{ route('payment_method.update') }}" method="POST">
              @csrf
              <input type="hidden" name="payment_method" value="razorpay">
              <div class="form-group">
                  <input type="hidden" name="types[]" value="RAZOR_KEY">
                  <div class="col-lg-3">
                      <label class="control-label">{{translate('RAZOR KEY')}}</label>
                  </div>
                  <div class="col-lg-6">
                      <input type="text" class="form-control" name="RAZOR_KEY" value="{{  env('RAZOR_KEY') }}" placeholder="{{ translate('RAZOR KEY') }}" required>
                  </div>
              </div>
              <div class="form-group">
                  <input type="hidden" name="types[]" value="RAZOR_SECRET">
                  <div class="col-lg-3">
                      <label class="control-label">{{translate('RAZOR SECRET')}}</label>
                  </div>
                  <div class="col-lg-6">
                      <input type="text" class="form-control" name="RAZOR_SECRET" value="{{  env('RAZOR_SECRET') }}" placeholder="{{ translate('RAZOR SECRET') }}" required>
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-lg-12 text-right">
                      <button class="btn btn-purple" type="submit">{{translate('Save')}}</button>
                  </div>
              </div>
          </form>
      </div>
  </div>
</div>


<div class="col-lg-6">
  <div class="panel">
      <div class="panel-heading">
          <h3 class="panel-title text-center">{{translate('Instamojo Credential')}}</h3>
      </div>
      <div class="panel-body">
          <form class="form-horizontal" action="{{ route('payment_method.update') }}" method="POST">
              @csrf
              <input type="hidden" name="payment_method" value="instamojo">
              <div class="form-group">
                  <input type="hidden" name="types[]" value="IM_API_KEY">
                  <div class="col-lg-3">
                      <label class="control-label">{{translate('API KEY')}}</label>
                  </div>
                  <div class="col-lg-6">
                      <input type="text" class="form-control" name="IM_API_KEY" value="{{  env('IM_API_KEY') }}" placeholder="{{ translate('IM API KEY') }}" required>
                  </div>
              </div>
              <div class="form-group">
                  <input type="hidden" name="types[]" value="IM_AUTH_TOKEN">
                  <div class="col-lg-3">
                      <label class="control-label">{{translate('AUTH TOKEN')}}</label>
                  </div>
                  <div class="col-lg-6">
                      <input type="text" class="form-control" name="IM_AUTH_TOKEN" value="{{  env('IM_AUTH_TOKEN') }}" placeholder="{{ translate('IM AUTH TOKEN') }}" required>
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-lg-3">
                      <label class="control-label">{{translate('Instamojo Sandbox Mode')}}</label>
                  </div>
                  <div class="col-lg-6">
                      <label class="switch">
                          <input value="1" name="instamojo_sandbox" type="checkbox" @if (\App\BusinessSetting::where('type', 'instamojo_sandbox')->first()->value == 1)
                          checked
                              @endif>
                          <span class="slider round"></span>
                      </label>
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-lg-12 text-right">
                      <button class="btn btn-purple" type="submit">{{translate('Save')}}</button>
                  </div>
              </div>
          </form>
      </div>
  </div>
</div>

<div class="col-lg-6">
  <div class="panel">
      <div class="panel-heading">
          <h3 class="panel-title text-center">{{translate('PayStack Credential')}}</h3>
      </div>
      <div class="panel-body">
          <form class="form-horizontal" action="{{ route('payment_method.update') }}" method="POST">
              @csrf
              <input type="hidden" name="payment_method" value="paystack">
              <div class="form-group">
                  <input type="hidden" name="types[]" value="PAYSTACK_PUBLIC_KEY">
                  <div class="col-lg-3">
                      <label class="control-label">{{translate('PUBLIC KEY')}}</label>
                  </div>
                  <div class="col-lg-6">
                      <input type="text" class="form-control" name="PAYSTACK_PUBLIC_KEY" value="{{  env('PAYSTACK_PUBLIC_KEY') }}" placeholder="{{ translate('PUBLIC KEY') }}" required>
                  </div>
              </div>
              <div class="form-group">
                  <input type="hidden" name="types[]" value="PAYSTACK_SECRET_KEY">
                  <div class="col-lg-3">
                      <label class="control-label">{{translate('SECRET KEY')}}</label>
                  </div>
                  <div class="col-lg-6">
                      <input type="text" class="form-control" name="PAYSTACK_SECRET_KEY" value="{{  env('PAYSTACK_SECRET_KEY') }}" placeholder="{{ translate('SECRET KEY') }}" required>
                  </div>
              </div>
              <div class="form-group">
                  <input type="hidden" name="types[]" value="MERCHANT_EMAIL">
                  <div class="col-lg-3">
                      <label class="control-label">{{translate('MERCHANT EMAIL')}}</label>
                  </div>
                  <div class="col-lg-6">
                      <input type="text" class="form-control" name="MERCHANT_EMAIL" value="{{  env('MERCHANT_EMAIL') }}" placeholder="{{ translate('MERCHANT EMAIL') }}" required>
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-lg-12 text-right">
                      <button class="btn btn-purple" type="submit">{{translate('Save')}}</button>
                  </div>
              </div>
          </form>
      </div>
  </div>
</div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title text-center">{{translate('VoguePay Credential')}}</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="{{ route('payment_method.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="payment_method" value="voguepay">
                    <div class="form-group">
                        <input type="hidden" name="types[]" value="VOGUE_MERCHANT_ID">
                        <div class="col-lg-3">
                            <label class="control-label">{{translate('MERCHANT ID')}}</label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="VOGUE_MERCHANT_ID" value="{{  env('VOGUE_MERCHANT_ID') }}" placeholder="{{ translate('MERCHANT ID') }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-3">
                            <label class="control-label">{{translate('Sandbox Mode')}}</label>
                        </div>
                        <div class="col-lg-6">
                            <label class="switch">
                                <input value="1" name="voguepay_sandbox" type="checkbox" @if (\App\BusinessSetting::where('type', 'voguepay_sandbox')->first()->value == 1)
                                checked
                                    @endif>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12 text-right">
                            <button class="btn btn-purple" type="submit">{{translate('Save')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title text-center">{{translate('Payhere Credential')}}</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="{{ route('payment_method.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="payment_method" value="payhere">
                    <div class="form-group">
                        <input type="hidden" name="types[]" value="PAYHERE_MERCHANT_ID">
                        <div class="col-lg-3">
                            <label class="control-label">{{translate('PAYHERE MERCHANT ID')}}</label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="PAYHERE_MERCHANT_ID" value="{{  env('PAYHERE_MERCHANT_ID') }}" placeholder="{{ translate('PAYHERE MERCHANT ID') }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="types[]" value="PAYHERE_SECRET">
                        <div class="col-lg-3">
                            <label class="control-label">{{translate('PAYHERE SECRET')}}</label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="PAYHERE_SECRET" value="{{  env('PAYHERE_SECRET') }}" placeholder="{{ translate('PAYHERE SECRET') }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="types[]" value="PAYHERE_CURRENCY">
                        <div class="col-lg-3">
                            <label class="control-label">{{translate('PAYHERE CURRENCY')}}</label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="PAYHERE_CURRENCY" value="{{  env('PAYHERE_CURRENCY') }}" placeholder="{{ translate('PAYHERE CURRENCY') }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-3">
                            <label class="control-label">{{translate('Payhere Sandbox Mode')}}</label>
                        </div>
                        <div class="col-lg-6">
                            <label class="switch">
                                <input value="1" name="payhere_sandbox" type="checkbox" @if (\App\BusinessSetting::where('type', 'payhere_sandbox')->first()->value == 1)
                                checked
                                    @endif>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12 text-right">
                            <button class="btn btn-purple" type="submit">{{translate('Save')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title text-center">{{translate('Ngenius Credential')}}</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="{{ route('payment_method.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="payment_method" value="ngenius">
                    <div class="form-group">
                        <input type="hidden" name="types[]" value="NGENIUS_OUTLET_ID">
                        <div class="col-lg-3">
                            <label class="control-label">{{translate('NGENIUS OUTLET ID')}}</label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="NGENIUS_OUTLET_ID" value="{{  env('NGENIUS_OUTLET_ID') }}" placeholder="{{ translate('NGENIUS OUTLET ID') }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="types[]" value="NGENIUS_API_KEY">
                        <div class="col-lg-3">
                            <label class="control-label">{{translate('NGENIUS API KEY')}}</label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="NGENIUS_API_KEY" value="{{  env('NGENIUS_API_KEY') }}" placeholder="{{ translate('NGENIUS API KEY') }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="types[]" value="NGENIUS_CURRENCY">
                        <div class="col-lg-3">
                            <label class="control-label">{{translate('NGENIUS CURRENCY')}}</label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="NGENIUS_CURRENCY" value="{{  env('NGENIUS_CURRENCY') }}" placeholder="{{ translate('NGENIUS CURRENCY') }}" required>
                            <div class="alert alert-primary" role="alert">
                                Currency must be <b>AED</b> or <b>USD</b> or <b>EUR</b><br>
                                If kept empty, <b>AED</b> will be used automatically
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12 text-right">
                            <button class="btn btn-purple" type="submit">{{translate('Save')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if(\App\Addon::where('unique_identifier', 'african_pg')->first() != null && \App\Addon::where('unique_identifier', 'african_pg')->first()->activated)
    <div class="col-lg-6">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title text-center">{{translate('Mpesa Credential')}}</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="{{ route('payment_method.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="payment_method" value="mpesa">
                    <div class="form-group">
                        <input type="hidden" name="types[]" value="MPESA_CONSUMER_KEY">
                        <div class="col-lg-3">
                            <label class="control-label">{{translate('MPESA CONSUMER KEY')}}</label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="MPESA_CONSUMER_KEY" value="{{  env('MPESA_CONSUMER_KEY') }}" placeholder="{{ translate('MPESA_CONSUMER_KEY') }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="types[]" value="MPESA_CONSUMER_SECRET">
                        <div class="col-lg-3">
                            <label class="control-label">{{translate('MPESA CONSUMER SECRET')}}</label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="MPESA_CONSUMER_SECRET" value="{{  env('MPESA_CONSUMER_SECRET') }}" placeholder="{{ translate('MPESA_CONSUMER_SECRET') }}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="types[]" value="MPESA_SHORT_CODE">
                        <div class="col-lg-3">
                            <label class="control-label">{{translate('MPESA SHORT CODE')}}</label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="MPESA_SHORT_CODE" value="{{  env('MPESA_SHORT_CODE') }}" placeholder="{{ translate('MPESA_SHORT_CODE') }}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="types[]" value="MPESA_ENV">
                        <div class="col-lg-3">
                            <label class="control-label">{{translate('MPESA SANDBOX ACTIVATION')}}</label>
                        </div>
                        <div class="col-lg-6">
                            <select name="MPESA_ENV" class="form-control" required>
                                @if(env('MPESA_ENV') == 'sandbox')
                                    <option value="live">live</option>
                                    <option value="sandbox" selected>sandbox</option>
                                @else
                                    <option value="live" selected>live</option>
                                    <option value="sandbox">sandbox</option>
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-12 text-right">
                            <button class="btn btn-purple" type="submit">{{translate('Save')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title text-center">{{translate('Flutterwave Credential')}}</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="{{ route('payment_method.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="payment_method" value="flutterwave">
                    <div class="form-group">
                        <input type="hidden" name="types[]" value="RAVE_PUBLIC_KEY">
                        <div class="col-lg-3">
                            <label class="control-label">{{translate('RAVE_PUBLIC_KEY')}}</label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="RAVE_PUBLIC_KEY" value="{{  env('RAVE_PUBLIC_KEY') }}" placeholder="{{ translate('RAVE_PUBLIC_KEY') }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="types[]" value="RAVE_SECRET_KEY">
                        <div class="col-lg-3">
                            <label class="control-label">{{translate('RAVE_SECRET_KEY')}}</label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="RAVE_SECRET_KEY" value="{{  env('RAVE_SECRET_KEY') }}" placeholder="{{ translate('RAVE_SECRET_KEY') }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="types[]" value="RAVE_TITLE">
                        <div class="col-lg-3">
                            <label class="control-label">{{translate('RAVE_TITLE')}}</label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="RAVE_TITLE" value="{{  env('RAVE_TITLE') }}" placeholder="{{ translate('RAVE_TITLE') }}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="types[]" value="RAVE_ENVIRONMENT">
                        <div class="col-lg-3">
                            <label class="control-label">{{translate('STAGIN ACTIVATION')}}</label>
                        </div>
                        <div class="col-lg-6">
                            <select name="RAVE_ENVIRONMENT" class="form-control" required>
                                @if(env('RAVE_ENVIRONMENT') == 'staging')
                                    <option value="live">live</option>
                                    <option value="staging" selected>staging</option>
                                @else
                                    <option value="live" selected>live</option>
                                    <option value="staging">staging</option>
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-12 text-right">
                            <button class="btn btn-purple" type="submit">{{translate('Save')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif

</div>
*/
    ?>
@endsection
