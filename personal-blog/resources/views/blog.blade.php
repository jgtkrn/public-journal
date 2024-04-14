@extends('template_blog.content')
	
@section('isi')
				<div class="col-md-6 hot-post-left">
					<!-- post -->
					@foreach($satu as $top)
					<div class="post post-thumb">
						<a class="post-img" href="{{ route('blog.isi', $top->slug ) }}"><img src="{{ asset('public/'."$top->gambar")}}" alt="{{ $top->judul }}"></a>
						<div class="post-body">
							<div class="post-category">
								<a href="{{ $top->judul }}">{{ $top->category->name }}</a>
							</div>
							<h3 class="post-title"><a href="{{ $top->judul }}">{{ $top->judul }}</a></h3>
							<ul class="post-meta">
								<li><a href="{{ $top->judul }}">{{ $top->users->name }}</a></li>
								<li>{{ $top->created_at->diffForHumans() }}</li>
							</ul>
						</div>
					</div>
					@endforeach
					<!-- /post -->
					<!-- post -->
					@foreach($dua as $top)
					<div class="post post-thumb">
						<a class="post-img" href="{{ route('blog.isi', $top->slug ) }}"><img src="{{ asset('public/'."$top->gambar")}}" alt="{{ $top->judul }}" alt="{{ $top->judul }}"></a>
						<div class="post-body">
							<div class="post-category">
								<a href="{{ $top->judul }}">{{ $top->category->name }}</a>
							</div>
							<h3 class="post-title"><a href="{{ $top->judul }}">{{ $top->judul }}</a></h3>
							<ul class="post-meta">
								<li><a href="{{ $top->judul }}">{{ $top->users->name }}</a></li>
								<li>{{ $top->created_at->diffForHumans() }}</li>
							</ul>
						</div>
					</div>
					@endforeach
					<!-- /post -->
				</div>
				<div class="col-md-6 hot-post-right">
					<!-- post -->
					@foreach($tiga as $top)
					<div class="post post-thumb">
						<a class="post-img" href="{{ route('blog.isi', $top->slug ) }}"><img src="{{ asset('public/'."$top->gambar")}}" alt="{{ $top->judul }}" alt="{{ $top->judul }}"></a>
						<div class="post-body">
							<div class="post-category">
								<a href="{{ $top->judul }}">{{ $top->category->name }}</a>
							</div>
							<h3 class="post-title"><a href="{{ $top->judul }}">{{ $top->judul }}</a></h3>
							<ul class="post-meta">
								<li><a href="{{ $top->judul }}">{{ $top->users->name }}</a></li>
								<li>{{ $top->created_at->diffForHumans() }}</li>
							</ul>
						</div>
					</div>
					@endforeach
					<!-- /post -->

					<!-- post -->
					@foreach($empat as $top)
					<div class="post post-thumb">
						<a class="post-img" href="{{ route('blog.isi', $top->slug ) }}"><img src="{{ asset('public/'."$top->gambar")}}" alt="{{ $top->judul }}" alt="{{ $top->judul }}"></a>
						<div class="post-body">
							<div class="post-category">
								<a href="{{ $top->judul }}">{{ $top->category->name }}</a>
							</div>
							<h3 class="post-title"><a href="{{ $top->judul }}">{{ $top->judul }}</a></h3>
							<ul class="post-meta">
								<li><a href="{{ $top->judul }}">{{ $top->users->name }}</a></li>
								<li>{{ $top->created_at->diffForHumans() }}</li>
							</ul>
						</div>
					</div>
					@endforeach
					<!-- /post -->
				</div>
	
		<!-- /container -->
	<!-- /SECTION -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-8">
					<!-- row -->
					<div class="row">
						<div class="col-md-12">
							<div class="section-title">
								<h2 class="title">Postingan Terbaru</h2>
							</div>
						</div>
						<!-- post -->
						@foreach($data as $post_terbaru)
						<div class="col-md-6">
							<div class="post">
								<a class="post-img" href="{{ route('blog.isi', $post_terbaru->slug ) }}"><img src="{{ asset('public/'."$post_terbaru->gambar")}}" alt="{{ $post_terbaru->judul }}" style="height: 200px"></a>
								<div class="post-body">
									<div class="post-category">
										<a href="#">{{ $post_terbaru->category->name }}</a>
									</div>
									<h3 class="post-title"><a href="{{ route('blog.isi', $post_terbaru->slug ) }}">{{ $post_terbaru->judul }}</a></h3>
									<ul class="post-meta">
										<li><a href="#">{{ $post_terbaru->users->name }}</a></li>
										<li>{{ $post_terbaru->created_at->diffForHumans() }}</li>
									</ul>
								</div>
							</div>
						</div>
						@endforeach
			
					</div>
					<!-- /row -->

	
				</div>

		
			<!-- /row -->
@endsection




