@extends('front.Base')
@section('title','Render | Blog')
@section('main')
    <div class="main wrap container">
        <div class="ts-row cf">
            <div class="col-sm-8 main-content cf">

                <article id="post-5968"
                         class="post-5968 post type-post status-publish format-standard has-post-thumbnail category-phong-cach"
                         itemscope="" itemtype="http://schema.org/Article">

                    <header class="post-header cf">

                        <div class="featured">


                            <a href="https://blog.ferosh.vn/wp-content/uploads/2020/04/1200x630-1-1.jpg"
                               itemprop="image" class="image-link"><img width="740" height="357"
                                                                        src="https://blog.ferosh.vn/wp-content/uploads/2020/04/1200x630-1-1-740x357.jpg"
                                                                        class="attachment-motive-alt-slider size-motive-alt-slider wp-post-image"
                                                                        alt="1200x630-1 (1)"
                                                                        title="CÁCH SẮP XẾP LẠI QUẦN ÁO ĐỂ TĂNG DIỆN TÍCH TỦ ĐỒ"
                                                                        srcset="https://blog.ferosh.vn/wp-content/uploads/2020/04/1200x630-1-1-740x357.jpg 740w, https://blog.ferosh.vn/wp-content/uploads/2020/04/1200x630-1-1-352x169.jpg 352w, https://blog.ferosh.vn/wp-content/uploads/2020/04/1200x630-1-1-352x169@2x.jpg 704w"
                                                                        sizes="(max-width: 740px) 100vw, 740px">

                            </a>


                        </div>


                        <h1 class="post-title item fn" itemprop="name">{{$item->title}}</h1>
                    </header><!-- .post-header -->

                    <div class="post-meta">
		<span class="posted-by">By
			<span class="reviewer" itemprop="author"><a href="https://blog.ferosh.vn/author/hanhntn/"
                                                        title="Posts by Ferosh Lady" rel="author">Render Lady</a></span>
		</span>

                        <span class="posted-on">on<span class="dtreviewed">
				<time class="value-datetime" datetime="{{$item->created_at}}"
                      itemprop="datePublished">{{$item->created_at}}</time>
			</span>
		</span>

                        <span class="cats">

				<a href="https://blog.ferosh.vn/phong-cach/" class="cat cat-color-6">PHONG CÁCH</a>


		</span>
                    </div>

                    <div class="post-container cf">
                        <div class="post-content text-font description" itemprop="articleBody">
                            <h1><strong>{{$item->title}}</strong></h1>
                            {!! $item->content !!}

                        </div><!-- .post-content -->
                    </div>

                    <div class="post-footer cf">


                        <div class="post-tags"></div>


                        <div class="post-share">

                            <div class="share-links">

                                <a href="http://www.facebook.com/sharer.php?u=https%3A%2F%2Fblog.ferosh.vn%2Fcach-sap-xep-quan-ao-tang-dien-tich-tu%2F"
                                   class="fa fa-facebook" title="" data-original-title="Share on Facebook">
                                    <span class="visuallyhidden">Facebook</span></a>

                                <a href="http://twitter.com/home?status=https%3A%2F%2Fblog.ferosh.vn%2Fcach-sap-xep-quan-ao-tang-dien-tich-tu%2F"
                                   class="fa fa-twitter" title="" data-original-title="Tweet It">
                                    <span class="visuallyhidden">Twitter</span></a>

                                <a href="http://plus.google.com/share?url=https%3A%2F%2Fblog.ferosh.vn%2Fcach-sap-xep-quan-ao-tang-dien-tich-tu%2F"
                                   class="fa fa-google-plus" title="" data-original-title="Share on Google+">
                                    <span class="visuallyhidden">Google+</span></a>

                                <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=https%3A%2F%2Fblog.ferosh.vn%2Fcach-sap-xep-quan-ao-tang-dien-tich-tu%2F"
                                   class="fa fa-linkedin" title="" data-original-title="Share on LinkedIn">
                                    <span class="visuallyhidden">LinkedIn</span></a>

                                <a href="#" class="more" data-original-title="" title="">more</a>

                                <div class="share-more">

                                    <a href="http://pinterest.com/pin/create/button/?url=https%3A%2F%2Fblog.ferosh.vn%2Fcach-sap-xep-quan-ao-tang-dien-tich-tu%2F&amp;media=https%3A%2F%2Fblog.ferosh.vn%2Fwp-content%2Fuploads%2F2020%2F04%2F1200x630-1-1.jpg"
                                       class="fa fa-pinterest" title="" data-original-title="Share on Pinterest">
                                        <span class="visuallyhidden">Pinterest</span></a>

                                    <a href="http://www.tumblr.com/share/link?url=https%3A%2F%2Fblog.ferosh.vn%2Fcach-sap-xep-quan-ao-tang-dien-tich-tu%2F&amp;name=C%C3%81CH+S%E1%BA%AEP+X%E1%BA%BEP+L%E1%BA%A0I+QU%E1%BA%A6N+%C3%81O+%C4%90%E1%BB%82+T%C4%82NG+DI%E1%BB%86N+T%C3%8DCH+T%E1%BB%A6+%C4%90%E1%BB%92"
                                       class="fa fa-tumblr" title="" data-original-title="Share on Tumblr">
                                        <span class="visuallyhidden">Tumblr</span></a>

                                    <a href="mailto:?subject=C%C3%81CH%20S%E1%BA%AEP%20X%E1%BA%BEP%20L%E1%BA%A0I%20QU%E1%BA%A6N%20%C3%81O%20%C4%90%E1%BB%82%20T%C4%82NG%20DI%E1%BB%86N%20T%C3%8DCH%20T%E1%BB%A6%20%C4%90%E1%BB%92&amp;body=https%3A%2F%2Fblog.ferosh.vn%2Fcach-sap-xep-quan-ao-tang-dien-tich-tu%2F"
                                       class="fa fa-envelope-o" title="" data-original-title="Email It">
                                        <span class="visuallyhidden">Email</span></a>

                                </div>

                            </div>
                        </div>


                    </div>

                </article>


                <section class="related-posts">
                    <h3 class="section-head cf"><span class="title">BÀI LIÊN QUAN</span></h3>
                    <ul class="ts-row">


                        <li class="column posts-grid one-third">

                            <article>

                                <a href="https://blog.ferosh.vn/cac-cach-giu-trang-diem-luon-tuoi-moi/"
                                   title="CÁC CÁCH GIỮ ĐỒ TRANG ĐIỂM LUÔN TƯƠI MỚI" class="image-link">
                                    <img width="252" height="167"
                                         src="https://blog.ferosh.vn/wp-content/uploads/2020/04/1200X630-1-252x167.jpg"
                                         class="image wp-post-image" alt="1200X630-1"
                                         title="CÁC CÁCH GIỮ ĐỒ TRANG ĐIỂM LUÔN TƯƠI MỚI"
                                         srcset="https://blog.ferosh.vn/wp-content/uploads/2020/04/1200X630-1-252x167.jpg 252w, https://blog.ferosh.vn/wp-content/uploads/2020/04/1200X630-1-252x167@2x.jpg 504w"
                                         sizes="(max-width: 252px) 100vw, 252px">
                                    <span class="image-overlay"></span>

                                    <span class="meta-overlay">
				<span class="meta">

				<span class="post-format "><i class="fa fa-file-text-o"></i></span>

				</span>
			</span>
                                </a>

                                <h3><a href="https://blog.ferosh.vn/cac-cach-giu-trang-diem-luon-tuoi-moi/"
                                       class="post-link">CÁC CÁCH GIỮ ĐỒ TRANG ĐIỂM LUÔN TƯƠI MỚI</a></h3>

                            </article>
                        </li>


                        <li class="column posts-grid one-third">

                            <article>

                                <a href="https://blog.ferosh.vn/cuoc-chien-day-lui-covid-19-cua-cac-ong-lon-nganh-thoi-trang/"
                                   title="CUỘC CHIẾN ĐẨY LÙI COVID-19 CỦA CÁC “ÔNG LỚN” NGÀNH THỜI TRANG"
                                   class="image-link">
                                    <img width="252" height="167"
                                         src="https://blog.ferosh.vn/wp-content/uploads/2020/04/1200x630-4-252x167.jpg"
                                         class="image wp-post-image" alt="1200x630 (4)"
                                         title="CUỘC CHIẾN ĐẨY LÙI COVID-19 CỦA CÁC “ÔNG LỚN” NGÀNH THỜI TRANG"
                                         srcset="https://blog.ferosh.vn/wp-content/uploads/2020/04/1200x630-4-252x167.jpg 252w, https://blog.ferosh.vn/wp-content/uploads/2020/04/1200x630-4-252x167@2x.jpg 504w"
                                         sizes="(max-width: 252px) 100vw, 252px">
                                    <span class="image-overlay"></span>

                                    <span class="meta-overlay">
				<span class="meta">

				<span class="post-format "><i class="fa fa-file-text-o"></i></span>

				</span>
			</span>
                                </a>

                                <h3>
                                    <a href="https://blog.ferosh.vn/cuoc-chien-day-lui-covid-19-cua-cac-ong-lon-nganh-thoi-trang/"
                                       class="post-link">CUỘC CHIẾN ĐẨY LÙI COVID-19 CỦA CÁC “ÔNG LỚN” NGÀNH THỜI
                                        TRANG</a></h3>

                            </article>
                        </li>


                        <li class="column posts-grid one-third">

                            <article>

                                <a href="https://blog.ferosh.vn/cham-soc-da-mat-dung-cach-mua-covid-19/"
                                   title="CHĂM SÓC DA MẶT ĐÚNG CÁCH MÙA COVID-19" class="image-link">
                                    <img width="252" height="167"
                                         src="https://blog.ferosh.vn/wp-content/uploads/2020/04/10-TIPS-SKINCARE-KHI-ĐEO-KHẨU-TRANG-252x167.jpg"
                                         class="image wp-post-image" alt="10-TIPS-SKINCARE-KHI-ĐEO-KHẨU-TRANG"
                                         title="CHĂM SÓC DA MẶT ĐÚNG CÁCH MÙA COVID-19"
                                         srcset="https://blog.ferosh.vn/wp-content/uploads/2020/04/10-TIPS-SKINCARE-KHI-ĐEO-KHẨU-TRANG-252x167.jpg 252w, https://blog.ferosh.vn/wp-content/uploads/2020/04/10-TIPS-SKINCARE-KHI-ĐEO-KHẨU-TRANG-252x167@2x.jpg 504w"
                                         sizes="(max-width: 252px) 100vw, 252px">
                                    <span class="image-overlay"></span>

                                    <span class="meta-overlay">
				<span class="meta">

				<span class="post-format "><i class="fa fa-file-text-o"></i></span>

				</span>
			</span>
                                </a>

                                <h3><a href="https://blog.ferosh.vn/cham-soc-da-mat-dung-cach-mua-covid-19/"
                                       class="post-link">CHĂM SÓC DA MẶT ĐÚNG CÁCH MÙA COVID-19</a></h3>

                            </article>
                        </li>

                    </ul>
                </section>


                <div class="comments">


                    <div id="comments" class="comments">

                        <p class="nocomments">Comments are closed.</p>


                    </div><!-- #comments -->
                </div>


            </div>
        </div> <!-- .ts-row -->
    </div>
@stop
