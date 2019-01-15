<div class="user-dashboard-notice">
  <h3>Salut,{{ $login_user_details['user_display_name'] }}</h3>
  <p>Vous avez la possibilité de visualiser en instantané l’activité récente de votre compte ou de ce qui se passe avec votre compte actuellement!</p>
</div><br>
 
<div class="row">
  <div class="col-lg-4 col-xs-12">
    <div class="small-box bg-gray">
      <div class="inner">
        <h3>{!! $dashboard_data['todays_order'] !!}</h3>
        <p> Les Commandes d'aujourd'hui</p>
      </div>
      <div class="icon">
        <i class="fa fa-area-chart"></i>
      </div>
      <a href="{{ route('my-orders-page') }}" class="small-box-footer">En savoir plus <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-4 col-xs-12">
    <div class="small-box bg-gray">
      <div class="inner">
        <h3>{!! $dashboard_data['total_order'] !!}</h3>
        <p>Toutes les commandes</p>
      </div>
      <div class="icon">
        <i class="fa fa-area-chart"></i>
      </div>
      <a href="{{ route('my-orders-page') }}" class="small-box-footer">En savoir plus <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-4 col-xs-12">
    <div class="small-box bg-gray">
      <div class="inner">
        <h3>{!! $dashboard_data['recent_coupon'] !!}</h3>
        <p>Compons récents</p>
      </div>
      <div class="icon">
        <i class="fa fa-percent"></i>
      </div>
      <a href="{{ route('my-coupons-page') }}" class="small-box-footer">En savoir plus <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>    
</div>
