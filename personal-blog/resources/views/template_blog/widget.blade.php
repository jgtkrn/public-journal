		<div class="col-md-4">
					<!-- ad widget-->
					<div class="aside-widget text-center">
						<a href="#" style="display: inline-block;margin: auto;">
							<img class="img-responsive" src="./img/ad-3.jpg" alt="">
						</a>
					</div>
					<!-- /ad widget -->

					<!-- social widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Social Media</h2>
						</div>
						<div class="social-widget">
							<ul>
								<li>
									<a href="#" class="social-facebook">
										<i class="fa fa-facebook"></i>
										<span>21.2K<br>Followers</span>
									</a>
								</li>
								<li>
									<a href="#" class="social-twitter">
										<i class="fa fa-twitter"></i>
										<span>10.2K<br>Followers</span>
									</a>
								</li>
								<li>
									<a href="#" class="social-google-plus">
										<i class="fa fa-google-plus"></i>
										<span>5K<br>Followers</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
					<!-- /social widget -->

					<!-- category widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Categories</h2>
						</div>
						<div class="category-widget">
							<ul>
								@foreach($category_widget as $hasil)
								<li><a href="{{ route('blog.category', $hasil->slug) }}">{{ $hasil->name }} <span>{{ $hasil->posts->count() }}</span></a></li>
								@endforeach
							</ul>
						</div>
					</div>
					<!-- /category widget -->

					<!-- newsletter widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Newsletter</h2>
						</div>
						<div class="newsletter-widget">
							<form action="{{url('kirim-email')}}">
								<p>Welcome to my page, may you send me message.</p>
								<input class="input" name="newsletter" placeholder="Send Message">
								<button class="primary-button" type="submit">Say Hello!</button>
							</form>
						</div>
					</div>
					<!-- /newsletter widget -->

					<!-- post widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Popular Posts</h2>
						</div>
						@foreach($populer as $widget)
						<!-- post -->
						<div class="post post-widget">
							<a class="post-img" href="{{ route('blog.isi', $widget->slug ) }}"><img src="{{ $widget->gambar }}" alt="{{ $widget->judul }}"></a>
							<div class="post-body">
								<div class="post-category">
									<a href="{{ route('blog.isi', $widget->slug ) }}">{{ $widget->category->name }}</a>
								</div>
								<h3 class="post-title"><a href="{{ route('blog.isi', $widget->slug ) }}">{{ $widget->judul }}</a></h3>
							</div>
						</div>
						<!-- /post -->
						@endforeach
					</div>
					<!-- /post widget -->
				</div>