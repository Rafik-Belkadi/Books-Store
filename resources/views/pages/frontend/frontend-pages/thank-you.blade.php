@section('frontend-thank-you-content')
  @if( count($order_details_for_thank_you_page) > 0)
  <section id="order-received-content">
    <div class="container new-container">
      <h3>Commande reçu !</h3><br>
      <p>Merci ,Vous receverez bientôt une notification à propos de vos commandes</p>
      <br>
      <div class="row">
        <div class="col-sm-12">
          <div class="col-sm-3">
            <div class="order-received-label-1"><strong>{{ trans('frontend.date') }}</strong></div>
            <div class="order-received-label-2"><em>{{ $order_details_for_thank_you_page['order_date'] }}</em></div>
          </div>
          <div class="col-sm-3">
            <div class="order-received-label-1"><strong>{{ trans('frontend.total') }}</strong></div>
            <div class="order-received-label-2"><em>{{ price_html( $order_details_for_thank_you_page['_final_order_total'], $order_details_for_thank_you_page['_order_currency'] ) }}</em></div>
          </div>
          <div class="col-sm-3">
            <div class="order-received-label-1"><strong>Methode de payment</strong></div>
            <div class="order-received-label-2"><em>{{ get_payment_method_title($order_details_for_thank_you_page['_payment_method']) }}</em></div>
          </div>
          <div class="clearfix"></div><br>
          
        @if(isset($order_details_for_thank_you_page['_payment_details']['method_instructions']))  
        <p class="payment_ins">{{ $order_details_for_thank_you_page['_payment_details']['method_instructions'] }}</p>
        @endif
        
        @if(isset($order_details_for_thank_you_page['_payment_details']['account_details']))  
          <h3>Nos détails bancaires</h3><br>
          <p>Bom de compte: {{ $order_details_for_thank_you_page['_payment_details']['account_details']['account_name'] }}</p>
          <p>N° de compte: {{ $order_details_for_thank_you_page['_payment_details']['account_details']['account_number'] }}</p>
          <p>Nom de la banque: {{ $order_details_for_thank_you_page['_payment_details']['account_details']['bank_name'] }}</p>
          <p>Code court bancaire: {{ $order_details_for_thank_you_page['_payment_details']['account_details']['short_code'] }}</p>
          <p>{{ trans('frontend.iban') }}: {{ $order_details_for_thank_you_page['_payment_details']['account_details']['iban'] }}</p>
          <p>{{ trans('frontend.bic_swift') }}: {{ $order_details_for_thank_you_page['_payment_details']['account_details']['swift'] }}</p>
        @endif
        
        <h3>Détails de la commande</h3><br>
        <div class="table-responsive cart_info">
          @if(count($order_details_for_thank_you_page['ordered_items'])>0)   
            <table class="table table-condensed">
              <thead>
                <tr class="cart_menu">
                  <td class="Item">Produit</td>
                  <td class="price">{{ trans('frontend.price') }}</td>
                  <td class="quantity">Quantité</td>
                  <td class="total">{{ trans('frontend.total') }}</td>
                </tr>
              </thead>
              <tbody> 
                @foreach($order_details_for_thank_you_page['ordered_items'] as $items)
                <tr>
                  <td class="cart_description">
                    <h5>{!! $items['name'] !!}</h5>
                    <?php $count = 1; ?>
                    @if(count($items['options']) > 0)
                    <p>
                      @foreach($items['options'] as $key => $val)
                        @if($count == count($items['options']))
                          {!! $key .' &#8658; '. $val !!}
                        @else
                          {!! $key .' &#8658; '. $val. ' , ' !!}
                        @endif
                        <?php $count ++ ; ?>
                      @endforeach
                    </p>
                    @endif
                    
                    @if($items['product_type'] == 'downloadable_product' && $order_details_for_thank_you_page['_customer_ip_address'] == get_ip_address())
                    {!! download_file_html( $items['id'], $order_details_for_thank_you_page['order_id']) !!}
                    @endif
                  </td>
                  <td class="cart_price">
                    <p> {!! price_html( $items['order_price'], $order_details_for_thank_you_page['_order_currency'] ) !!} </p>
                  </td>
                  <td class="cart_quantity">
                      <p> {!! $items['quantity'] !!} </p>
                  </td>
                  <td class="cart_total">
                    <p>{!! price_html( ($items['quantity']*$items['order_price']), $order_details_for_thank_you_page['_order_currency'] ) !!}</p>
                  </td>
                </tr>
                @endforeach
                
                <tr class="order-items-data">
                  <td colspan="4" class="order-total">
                    <div class="items-div-main"><div class="items-label"><strong>{{ trans('frontend.tax') }}</strong></div> <div class="items-value">{!! price_html( $order_details_for_thank_you_page['_final_order_tax'], $order_details_for_thank_you_page['_order_currency'] ) !!}</div></div>
                    
                    <div class="items-div-main"><div class="items-label"><strong>{{ trans('frontend.shipping_cost') }}</strong></div> <div class="items-value">{!! price_html( $order_details_for_thank_you_page['_final_order_shipping_cost'], $order_details_for_thank_you_page['_order_currency'] ) !!}</div></div>
                    
                    @if($order_details_for_thank_you_page['_is_order_coupon_applyed'] == true)
                    <div class="items-div-main order-discount-label"><div class="items-label"><strong>{{ trans('frontend.coupon_discount_label') }}</strong></div> <div class="items-value"> - {!! price_html( $order_details_for_thank_you_page['_final_order_discount'], $order_details_for_thank_you_page['_order_currency'] ) !!}</div></div>
                    @endif
                    
                    <div class="items-div-main"><div class="items-label"><strong>{{ trans('frontend.order_total') }}</strong></div> <div class="items-value">{!! price_html( $order_details_for_thank_you_page['_final_order_total'], $order_details_for_thank_you_page['_order_currency'] ) !!}</div></div>
                  </td>
                </tr>
              </tbody>
            </table>
            @endif
          </div>
          <br>
            
          
            <div class="col-sm-6">
              <h4>Adresse de livraison</h4><hr>
              <p>{!! $order_details_for_thank_you_page['customer_address']['_shipping_first_name'].' '. $order_details_for_thank_you_page['customer_address']['_shipping_last_name']!!}</p>
              @if($order_details_for_thank_you_page['customer_address']['_shipping_company'])
                <p><strong>{{ trans('frontend.company') }}:</strong> {!! $order_details_for_thank_you_page['customer_address']['_shipping_company'] !!}</p>
              @endif
              <p><strong>{{ trans('frontend.address_1') }}:</strong> {!! $order_details_for_thank_you_page['customer_address']['_shipping_address_1'] !!}</p>
              @if($order_details_for_thank_you_page['customer_address']['_shipping_address_2'])
                <p><strong>{{ trans('frontend.address_2') }}:</strong> {!! $order_details_for_thank_you_page['customer_address']['_shipping_address_2'] !!}</p>
              @endif
              <p><strong>{{ trans('frontend.city') }}:</strong> {!! $order_details_for_thank_you_page['customer_address']['_shipping_city'] !!}</p>
              <p><strong>{{ trans('frontend.postCode') }}:</strong> {!! $order_details_for_thank_you_page['customer_address']['_shipping_postcode'] !!}</p>
              <p><strong>{{ trans('frontend.country') }}:</strong> {!! get_country_by_code( $order_details_for_thank_you_page['customer_address']['_shipping_country'] ) !!}</p>

              <br>

              <p><strong>{{ trans('frontend.phone') }}:</strong> {!! $order_details_for_thank_you_page['customer_address']['_shipping_phone'] !!}</p>

              @if($order_details_for_thank_you_page['customer_address']['_shipping_fax'])
                <p><strong>{{ trans('frontend.fax') }}:</strong> {!! $order_details_for_thank_you_page['customer_address']['_shipping_fax'] !!}</p>
              @endif
              
              <p><strong>{{ trans('frontend.email') }}:</strong> {!! $order_details_for_thank_you_page['customer_address']['_shipping_email'] !!}</p>
            </div>
            @if ($order_details_for_thank_you_page['_payment_method'] == 'cod')
              
            @else
              <div class="col-md-6">
              <h4> Veuillez completer par la photo du talon et la ville de livraison </h4><hr>              
              {!! Form::open(['action' => ['Frontend\FrontendManagerController@addTalonImage', $order_details_for_thank_you_page['order_id']], 'files' => 'true', 'method' => 'POST', 'enctype' => 'multipart/data']) !!}
                <div class="container">
                  <div class="row">
                    <div class="col-md-3">
                      <div >
                      <select id="change_town" name="change_town">
                        
                        <option value="Alger">{{ trans('Alger') }}</option>
                        <option value="Oran">{{ trans('Oran') }}</option>
                        <option value="Annaba">{{ trans('Annaba') }}</option>

                      </select>
                      </div>
                    </div>
                    <div >
                      {{Form::file('talon_image','',array('required'))}}
                      <br>
                    </div>
                    <div class="alert alert-danger" style="margin-top: 5px; width: 50%">
                       Obligatoire
                       note : Vous pouvez faire cela maintenant, ou plus tard sur votre profil dans la section commandes, et selectionner votre commande pour ajouter l'image du talon.
                     </div>
                    </div>
                  </div>
                                
              {{Form::hidden('_method', 'PUT')}}
              {{Form::submit('Confirmer', ['class' => 'btn btn-primary'])}}
              
              {!! Form::close() !!}
                </div>
            </div>
            @endif
            
        </div>
      </div>
    </div>
  </section>
  <br>
  @else
  <section id="order-received-content">
    <div class="container new-container">
      <h5>{{ trans('frontend.no_content_yet') }}</h5>
    </div>
  </section>  
  @endif  
@endsection  