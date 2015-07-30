@layout('home')
@section('content')
<section class="module">
        <div class="module-head">
          <h4><b>Gallery</b></h4>
        </div><!--/.module-head-->
        <div class="content-body">
		<section class="module no-head">
			<div class="module-body">
				<div class="gallery-control">
					<div class="btn-group" data-toggle="buttons-checkbox">
						<button class="btn filter" data-filter="cats dogs krakens">All</button>
						<button class="btn filter" data-filter="dogs">Dogs</button>
						<button class="btn filter" data-filter="cats">Cats</button>
						<button class="btn filter" data-filter="krakens">Kraken</button>
					</div>
					<div class="btn-group pull-right" data-toggle="buttons-checkbox">
						<button class="btn sort" data-sort="data-name" data-order="desc">Name Desc</button>
						<button class="btn sort" data-sort="data-name" data-order="asc">Name Asc</button>
						<button class="btn sort" data-sort="data-age" data-order="desc">Age Desc</button>
						<button class="btn sort" data-sort="data-age" data-order="asc">Age Asc</button>
					</div>
				</div>

				<div class="mixitup">
					
					<ul id="Grid" class="unstyled">
						<li class="mix dogs" data-name="Abby" data-age="5554">
							<div>
								<div class="media-thumb">
									<img src="img/gallery/dog-1.jpg">
								</div>
								<div class="media-detail">
									<b>Abby, Dog</b>
									<div class="small muted">5554kb</div>
								</div>
							</div>
						</li>
						<li class="mix cats" data-name="Bucky" data-age="329">
							<div>
								<div class="media-thumb">
									<img src="img/gallery/cat-1.jpg">
								</div>
								<div class="media-detail">
									<b>Bucky, Cat</b>
									<div class="small muted">329kb</div>
								</div>
							</div>
						</li>
						<li class="mix dogs" data-name="Abraham" data-age="5554">
							<div>
								<div class="media-thumb">
									<img src="img/gallery/dog-2.jpg">
								</div>
								<div class="media-detail">
									<b>Abraham, Dog</b>
									<div class="small muted">5554kb</div>
								</div>
							</div>
						</li>
						<li class="mix krakens" data-name="Kraken" data-age="3987">
							<div>
								<div class="media-thumb">
									<img src="img/gallery/kraken-1.jpg">
								</div>
								<div class="media-detail">
									<b>Unnamed, Kraken</b>
									<div class="small muted">3987kb</div>
								</div>
							</div>
						</li>
						<li class="mix cats" data-name="Bale" data-age="329">
							<div>
								<div class="media-thumb">
									<img src="img/gallery/cat-2.jpg">
								</div>
								<div class="media-detail">
									<b>Bale, Cat</b>
									<div class="small muted">329kb</div>
								</div>
							</div>
						</li>
						<li class="mix dogs" data-name="Francis" data-age="254">
							<div>
								<div class="media-thumb">
									<img src="img/gallery/dog-3.jpg">
								</div>
								<div class="media-detail">
									<b>Francis, Dog</b>
									<div class="small muted">254kb</div>
								</div>
							</div>
						</li>
						<li class="mix cats" data-name="Cleo" data-age="59">
							<div>
								<div class="media-thumb">
									<img src="img/gallery/cat-3.jpg">
								</div>
								<div class="media-detail">
									<b>Cleo, Cat</b>
									<div class="small muted">59kb</div>
								</div>
							</div>
						</li>
						<li class="mix cats" data-name="Drew" data-age="129">
							<div>
								<div class="media-thumb">
									<img src="img/gallery/cat-4.jpg">
								</div>
								<div class="media-detail">
									<b>Drew, Cat</b>
									<div class="small muted">129kb</div>
								</div>
							</div>
						</li>
						<li class="mix krakens" data-name="Kraken" data-age="3987">
							<div>
								<div class="media-thumb">
									<img src="img/gallery/kraken-1.jpg">
								</div>
								<div class="media-detail">
									<b>Unnamed, Kraken</b>
									<div class="small muted">3987kb</div>
								</div>
							</div>
						</li>
						<li class="mix dogs" data-name="Abby" data-age="5554">
							<div>
								<div class="media-thumb">
									<img src="img/gallery/dog-1.jpg">
								</div>
								<div class="media-detail">
									<b>Abby, Dog</b>
									<div class="small muted">5554kb</div>
								</div>
							</div>
						</li>
						<li class="mix cats" data-name="Bucky" data-age="329">
							<div>
								<div class="media-thumb">
									<img src="img/gallery/cat-1.jpg">
								</div>
								<div class="media-detail">
									<b>Bucky, Cat</b>
									<div class="small muted">329kb</div>
								</div>
							</div>
						</li>
						<li class="mix dogs" data-name="Abraham" data-age="5554">
							<div>
								<div class="media-thumb">
									<img src="img/gallery/dog-2.jpg">
								</div>
								<div class="media-detail">
									<b>Abraham, Dog</b>
									<div class="small muted">5554kb</div>
								</div>
							</div>
						</li>
						<li class="mix cats" data-name="Bale" data-age="329">
							<div>
								<div class="media-thumb">
									<img src="img/gallery/cat-2.jpg">
								</div>
								<div class="media-detail">
									<b>Bale, Cat</b>
									<div class="small muted">329kb</div>
								</div>
							</div>
						</li>
						<li class="mix dogs" data-name="Francis" data-age="254">
							<div>
								<div class="media-thumb">
									<img src="img/gallery/dog-3.jpg">
								</div>
								<div class="media-detail">
									<b>Francis, Dog</b>
									<div class="small muted">254kb</div>
								</div>
							</div>
						</li>
						<li class="mix cats" data-name="Cleo" data-age="59">
							<div>
								<div class="media-thumb">
									<img src="img/gallery/cat-3.jpg">
								</div>
								<div class="media-detail">
									<b>Cleo, Cat</b>
									<div class="small muted">59kb</div>
								</div>
							</div>
						</li>
						<li class="mix cats" data-name="Drew" data-age="129">
							<div>
								<div class="media-thumb">
									<img src="img/gallery/cat-4.jpg">
								</div>
								<div class="media-detail">
									<b>Drew, Cat</b>
									<div class="small muted">129kb</div>
								</div>
							</div>
						</li>
					</ul>
				</div>

				<div class="gallery-nav">
					<div class="gallery-info pull-left">
						Showing 1-20 of 75
					</div>
					<div class="btn-group pull-right">
						<button class="btn"><i class="icon-chevron-left"></i></button>
						<button class="btn"><i class="icon-chevron-right"></i></button>
					</div>
				</div>
			</div><!--/.module-body-->
		</section>
	</div>
</div><!--/.content-->

</section>
@endsection