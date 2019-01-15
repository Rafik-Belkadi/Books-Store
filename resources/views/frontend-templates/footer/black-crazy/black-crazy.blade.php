<div class="footer-top full-width">
  <div class="footer-top-background">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4">
          <h3 class="widget-title">A propos</h3>
          <div class="is-divider small"></div>
          <p>{!! $appearance_all_data['footer_details']['footer_about_us_description'] !!}</p>
         
        
        
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4">
          <h3 class="widget-title">{!! trans('frontend.footer_tags_label') !!}</h3>
          <div class="is-divider small"></div>
          <div class="footer-tags-list">
            @if(count($popular_tags_list) > 0)
              @foreach($popular_tags_list as $tags)
                <a href="{{ route('tag-single-page', $tags['slug'])}}">{!! $tags['name'] !!}</a>
              @endforeach
            @else
            <p class="not-available">{!! trans('frontend.footer_no_tags_label') !!}</p>
            @endif
          </div>
        </div>
        

        <div class="col-xs-12 col-sm-12 col-md-4">
           <h3 class="widget-title">{!! trans('frontend.footer_follow_us') !!}</h3>
          <div class="is-divider small"></div>
          <ul class="social-media">
            <li><a class="facebook" href="//{{ $appearance_all_data['footer_details']['follow_us_url']['fb'] }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.fb_tooltip_msg') }}"><i class="fa fa-facebook"></i></a></li>
            <li><a class="twitter" href="//{{ $appearance_all_data['footer_details']['follow_us_url']['twitter'] }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.twitter_tooltip_msg') }}"><i class="fa fa-twitter"></i></a></li>
            <li><a class="linkedin" href="//{{ $appearance_all_data['footer_details']['follow_us_url']['linkedin'] }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.linkedin_tooltip_msg') }}"><i class="fa fa-linkedin"></i></a></li>
            <li><a class="dribbble" href="//{{ $appearance_all_data['footer_details']['follow_us_url']['dribbble'] }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.dribbble_tooltip_msg') }}"><i class="fa fa-dribbble"></i></a></li>
            <li><a class="google-plus" href="//{{ $appearance_all_data['footer_details']['follow_us_url']['google_plus'] }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.google_plus_tooltip_msg') }}"><i class="fa fa-google-plus"></i></a></li>
            <li><a class="instagram" href="//{{ $appearance_all_data['footer_details']['follow_us_url']['instagram'] }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.instagram_tooltip_msg') }}"><i class="fa fa-instagram"></i></a></li>
            <li><a class="youtube-play" href="//{{ $appearance_all_data['footer_details']['follow_us_url']['youtube'] }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.youtube_play_tooltip_msg') }}"><i class="fa fa-youtube-play"></i></a></li>
          </ul>
        </div>
        </div>

       
      </div>
    </div>
  </div>
</div>
