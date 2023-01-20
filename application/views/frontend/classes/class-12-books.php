<?php $this->load->view('frontend/partial/header')?>

        <div class="main-container col2-left-layout">
            <div class="main">
                <div class="breadcrumbs">
    <ul>
                    <li typeof="v:Breadcrumb" class="home">
                            <a rel="v:url" property="v:title" href="<?= base_url('Home')?>" title="Go to Home Page">Home</a>
                                        <span>/ </span>
                        </li>
                    <li typeof="v:Breadcrumb" class="category8">
                            <a rel="v:url" property="v:title" href="../classes.html" title="">Classes</a>
                                        <span>/ </span>
                        </li>
                    <li class="category34">
                            <strong><?php  foreach ($Classes as $key => $value) {
                                if($value->id==$class){
                                    $class=$value->name;
                                }
                               
                            } ;echo $class ?></strong>
                                    </li>
            </ul>
</div>
                                                <div class="col-left sidebar col-left-first"><div class="block block-layered-nav block-layered-nav--no-filters">
    <div class="block-title">
        <strong><span>Shop By</span></strong>
    </div>
    <div class="block-content toggle-content">
                                    <p class="block-subtitle block-subtitle--filter">Filter</p>
            <dl id="narrow-by-list">
                                                                                                    <dt>Price</dt>
                    <dd>
<ol>
    <li>
                    <a href="class-12-books35f0.html?price=-100">
                <span class="price">₹0.00</span> - <span class="price">₹99.99</span>                                <span class="count">(1)</span>
                            </a>
            </li>
    <li>
                    <a href="class-12-booksf5d2.html?price=100-200">
                <span class="price">₹100.00</span> - <span class="price">₹199.99</span>                                <span class="count">(24)</span>
                            </a>
            </li>
    <li>
                    <a href="class-12-booksd3cd.html?price=200-300">
                <span class="price">₹200.00</span> - <span class="price">₹299.99</span>                                <span class="count">(32)</span>
                            </a>
            </li>
    <li>
                    <a href="class-12-booksb8cb.html?price=300-400">
                <span class="price">₹300.00</span> - <span class="price">₹399.99</span>                                <span class="count">(12)</span>
                            </a>
            </li>
    <li>
                    <a href="class-12-books4528.html?price=400-500">
                <span class="price">₹400.00</span> - <span class="price">₹499.99</span>                                <span class="count">(13)</span>
                            </a>
            </li>
    <li>
                    <a href="class-12-books5907.html?price=500-600">
                <span class="price">₹500.00</span> - <span class="price">₹599.99</span>                                <span class="count">(1)</span>
                            </a>
            </li>
    <li>
                    <a href="class-12-books7091.html?price=600-700">
                <span class="price">₹600.00</span> - <span class="price">₹699.99</span>                                <span class="count">(3)</span>
                            </a>
            </li>
    <li>
                    <a href="class-12-books2a5d.html?price=800-">
                <span class="price">₹800.00</span> and above                                <span class="count">(1)</span>
                            </a>
            </li>
</ol>
</dd>
                                                                                                    <dt>Classes</dt>
                    <dd>
<ol>
    <li>
                    <a href="class-12-books/class10.html">
                 Class 10                                <span class="count">(1)</span>
                            </a>
            </li>
    <li>
                    <a href="class-12-books/class12.html">
                 Class 12                                <span class="count">(84)</span>
                            </a>
            </li>
</ol>
</dd>
                                                                    <dt>Subjects</dt>
                    <dd>
<ol>
    <li>
                    <a href="class-12-books/accountancy.html">
                Accountancy                                <span class="count">(1)</span>
                            </a>
            </li>
    <li>
                    <a href="class-12-books/biology.html">
                Biology                                <span class="count">(4)</span>
                            </a>
            </li>
    <li>
                    <a href="class-12-books/businessstudies.html">
                Business Studies                                <span class="count">(3)</span>
                            </a>
            </li>
    <li>
                    <a href="class-12-books/chemistry.html">
                Chemistry                                <span class="count">(6)</span>
                            </a>
            </li>
    <li>
                    <a href="class-12-books/computer.html">
                Computer                                <span class="count">(3)</span>
                            </a>
            </li>
    <li>
                    <a href="class-12-books/economics.html">
                Economics                                <span class="count">(3)</span>
                            </a>
            </li>
    <li>
                    <a href="class-12-books/english.html">
                English                                <span class="count">(11)</span>
                            </a>
            </li>
    <li>
                    <a href="class-12-books/englishgrammar.html">
                English Grammar                                <span class="count">(1)</span>
                            </a>
            </li>
    <li>
                    <a href="class-12-books/generalknowledge.html">
                General Knowledge                                <span class="count">(1)</span>
                            </a>
            </li>
    <li>
                    <a href="class-12-books/geography.html">
                Geography                                <span class="count">(5)</span>
                            </a>
            </li>
    <li>
                    <a href="class-12-books/hindi.html">
                Hindi                                <span class="count">(3)</span>
                            </a>
            </li>
    <li>
                    <a href="class-12-books/history.html">
                History                                <span class="count">(7)</span>
                            </a>
            </li>
    <li>
                    <a href="class-12-books/mathematics.html">
                Mathematics                                <span class="count">(9)</span>
                            </a>
            </li>
    <li>
                    <a href="class-12-books/physicaleducation.html">
                Physical Education                                <span class="count">(10)</span>
                            </a>
            </li>
    <li>
                    <a href="class-12-books/physics.html">
                Physics                                <span class="count">(5)</span>
                            </a>
            </li>
    <li>
                    <a href="class-12-books/politicalscience.html">
                Political Science                                <span class="count">(8)</span>
                            </a>
            </li>
    <li>
                    <a href="class-12-books/psychology.html">
                Psychology                                <span class="count">(1)</span>
                            </a>
            </li>
    <li>
                    <a href="class-12-books/sanskrit.html">
                Sanskrit                                <span class="count">(1)</span>
                            </a>
            </li>
    <li>
                    <a href="class-12-books/sociology.html">
                Sociology                                <span class="count">(4)</span>
                            </a>
            </li>
</ol>
</dd>
                                                                    <dt>Publishers</dt>
                    <dd>
<ol>
    <li>
                    <a href="class-12-books/arihantpublications.html">
                Arihant Publications                                <span class="count">(5)</span>
                            </a>
            </li>
    <li>
                    <a href="class-12-books/bharatibhawan.html">
                Bharati Bhawan                                <span class="count">(3)</span>
                            </a>
            </li>
    <li>
                    <a href="class-12-books/dhanpatrai.html">
                Dhanpat Rai                                <span class="count">(1)</span>
                            </a>
            </li>
    <li>
                    <a href="class-12-books/frankbrothers.html">
                Frank Brothers                                <span class="count">(1)</span>
                            </a>
            </li>
    <li>
                    <a href="class-12-books/frankeducationalaids.html">
                Frank Educational Aids                                <span class="count">(1)</span>
                            </a>
            </li>
    <li>
                    <a href="class-12-books/fullmarks.html">
                Full Marks                                <span class="count">(20)</span>
                            </a>
            </li>
    <li>
                    <a href="class-12-books/madhubuneducationalbooks.html">
                Madhubun Educational Books                                <span class="count">(3)</span>
                            </a>
            </li>
    <li>
                    <a href="class-12-books/mbd.html">
                MBD                                <span class="count">(16)</span>
                            </a>
            </li>
    <li>
                    <a href="class-12-books/newsaraswatihouse.html">
                New Saraswati House                                <span class="count">(2)</span>
                            </a>
            </li>
    <li>
                    <a href="class-12-books/orangeeducation.html">
                Orange Education                                <span class="count">(2)</span>
                            </a>
            </li>
    <li>
                    <a href="class-12-books/prachi.html">
                Prachi                                <span class="count">(18)</span>
                            </a>
            </li>
    <li>
                    <a href="class-12-books/premierpublications.html">
                Premier Publications                                <span class="count">(1)</span>
                            </a>
            </li>
    <li>
                    <a href="class-12-books/rachnasagar.html">
                Rachna Sagar                                <span class="count">(13)</span>
                            </a>
            </li>
    <li>
                    <a href="class-12-books/schand.html">
                S Chand                                <span class="count">(1)</span>
                            </a>
            </li>
</ol>
</dd>
                                                                    <dt>Authors</dt>
                    <dd>
<ol>
    <li>
                    <a href="class-12-books/manjeetsingh.html">
                Manjeet Singh                                <span class="count">(1)</span>
                            </a>
            </li>
    <li>
                    <a href="class-12-books/r.s.html">
                R.S. Aggarwal                                <span class="count">(1)</span>
                            </a>
            </li>
    <li>
                    <a href="class-12-books/rdsharma.html">
                RD Sharma                                <span class="count">(1)</span>
                            </a>
            </li>
</ol>
</dd>
                                            </dl>
            <script type="text/javascript">decorateDataList('narrow-by-list')</script>
            </div>
</div>
</div>
                                <div class="col-main">
  
<div class="page-title category-title">
        <h1><?= $class ?></h1>
</div>




        


       





<div class="category-products">

    <div class="toolbar">
            <div class="sorter">
                            <p class="view-mode">
                                                                <label>View as</label>
                                                                                    <strong title="Grid" class="grid">Grid</strong>
                                                                                                                <a href="class-12-booksa927.html?mode=list" title="List" class="list">List</a>
                                                                                        </p>
            
            <div class="sort-by">
                <label>Sort By</label>
                <select onchange="setLocation(this.value)" title="Sort By">
                                            <option value="https://mybookshop.co.in/myshop/classes/class-12-books?dir=asc&order=position" selected="selected">
                            Position                        </option>
                                            <option value="class-12-books79f7.html?dir=asc&amp;order=name">
                            Name                        </option>
                                            <option value="class-12-booksa21a.html?dir=asc&amp;order=classes">
                            Classes                        </option>
                                            <option value="class-12-books3f44.html?dir=asc&amp;order=subject_attribute">
                            Subjects                        </option>
                                            <option value="class-12-booksd75a.html?dir=asc&amp;order=publishers_attribute">
                            Publishers                        </option>
                                            <option value="class-12-booksa28b.html?dir=asc&amp;order=authors_attribute">
                            Authors                        </option>
                                            <option value="class-12-booksa869.html?dir=asc&amp;order=title">
                            Title                        </option>
                                            <option value="class-12-books02be.html?dir=asc&amp;order=publisher">
                            Publisher                        </option>
                                            <option value="class-12-booksb7d8.html?dir=asc&amp;order=author">
                            Author                        </option>
                                            <option value="class-12-bookscc1a.html?dir=asc&amp;order=isbn_productcode">
                            ISBN / Product Code                        </option>
                                            <option value="class-12-books2af7.html?dir=asc&amp;order=product_category">
                            Category                        </option>
                                            <option value="class-12-booksf0a0.html?dir=asc&amp;order=standard">
                            Standard                        </option>
                                            <option value="class-12-booksdbbc.html?dir=asc&amp;order=publication_year">
                            Publication Year                        </option>
                                            <option value="class-12-bookseb58.html?dir=asc&amp;order=edition">
                            Edition                        </option>
                                            <option value="class-12-books6161.html?dir=asc&amp;order=binding">
                            Binding                        </option>
                                            <option value="class-12-books8912.html?dir=asc&amp;order=noofpages">
                            No of Pages                        </option>
                                            <option value="class-12-books58e7.html?dir=asc&amp;order=language">
                            Language                        </option>
                                            <option value="class-12-bookse934.html?dir=asc&amp;order=subject">
                            Subject                        </option>
                                            <option value="class-12-books4e8c.html?dir=asc&amp;order=board">
                            Board                        </option>
                                            <option value="class-12-books5a2e.html?dir=asc&amp;order=hsncode">
                            HSN Code                        </option>
                                            <option value="class-12-books680c.html?dir=asc&amp;order=searchkeywords">
                            Search Keywords                        </option>
                                            <option value="class-12-books805b.html?dir=asc&amp;order=booktype">
                            Book Type                        </option>
                                            <option value="class-12-booksac72.html?dir=asc&amp;order=agegroup">
                            Age Group                        </option>
                                            <option value="class-12-books084b.html?dir=asc&amp;order=company_details">
                            Company Details                        </option>
                                    </select>
                                    <a href="class-12-books00ea.html?dir=desc&amp;order=position" class="sort-by-switcher sort-by-switcher--asc" title="Set Descending Direction">Set Descending Direction</a>
                            </div>
        </div>
        <div class="pager">
        <div class="count-container">
                            <p class="amount amount--has-pages">
                    1-12 of 87                </p>
            
            <div class="limiter">
                <label>Show</label>
                <select onchange="setLocation(this.value)" title="Results per page">
                                    <option value="https://mybookshop.co.in/myshop/classes/class-12-books?limit=12" selected="selected">
                        12                    </option>
                                    <option value="class-12-books45c7.html?limit=24">
                        24                    </option>
                                    <option value="class-12-books409f.html?limit=36">
                        36                    </option>
                                </select>
            </div>
        </div>

        
    
    
        <div class="pages">
        <strong>Page:</strong>
        <ol>
        
        
        
                                    <li class="current">1</li>
                                                <li><a href="class-12-books905b.html?p=2">2</a></li>
                                                <li><a href="class-12-books2207.html?p=3">3</a></li>
                                                <li><a href="class-12-books5c7e.html?p=4">4</a></li>
                                                <li><a href="class-12-booksc471.html?p=5">5</a></li>
                    

        
        
                    <li>
                <a class="next i-next" href="class-12-books905b.html?p=2" title="Next">
                                            Next                                    </a>
            </li>
                </ol>

    </div>
    
    

    </div>
</div>

    
    


    


    
    
    <ul class="products-grid products-grid--max-4-col">

        <?php foreach ($AllProduct as $key => $value) {
        
        ?>
            
            <li class="item last">
          
                <a href="<?= base_url('Home/productDeatils/'.$this->url_encrypt->encode($value->id))?>" title="MBD Geography Guide Class 12" class="product-image">

                    
                    <img id="product-collection-image-2243"

                         src="<?= base_url('uploads/images/'.$value->image)  ?>"

                         alt="MBD Geography Guide Class 12" />

                </a>

                <div class="product-info">

                    <h2 class="product-name"><a href="../mbd-super-refresher-geography-class-12.html" title="MBD Super Refresher Geography Class 12 (English Medium)"><?= $value->name ?></a></h2>

                    
                    

                        
    <div class="price-box">
                                            
                    <p class="old-price">
                <span class="price-label">Regular Price:</span>
                <span class="price" id="old-price-2243">
                    ₹<?= number_format($value->price_sale,2) ?>              </span>
            </p>

                            <p class="special-price">
                    <span class="price-label">Special Price</span>
                <span class="price" id="product-price-2243">
                    ₹<?= number_format($value->price_sale-($value->price_sale/100)*$value->offer,2) ?>                </span>
                </p>
                    		
		
		                <p class="yousave">
            <span class="price-label label">You Save: </span>
            <span class="price">
                <strong class="save-amount"><span class="price">₹<?= number_format(($value->price_sale/100)*$value->offer,2) ?></span></strong> (<?= $value->offer ?>%)
            </span>
        </p>
    		
	
    
        </div>


                    

                    
<div class="">
    <button type="button" title="Add to Cart" class="button btn-cart">
    <span> 
    <a href="<?= base_url('Home/AddToCart')?>" class="level1  ">
    <span style="color:white">Add
    to Cart</span></a></span></button>
   
    <!-- <ul class="add-to-links">
        SOLD OUT
    </ul> -->
</div>



                </div>

            </li>

            <?php } ?>
        
            
        
    </ul>

    <script type="text/javascript">decorateGeneric($$('ul.products-grid'), ['odd','even','first','last'])</script>

    


    <div class="toolbar-bottom">

        <div class="toolbar">
            <div class="sorter">
                            <p class="view-mode">
                                                                <label>View as</label>
                                                                                    <strong title="Grid" class="grid">Grid</strong>
                                                                                                                <a href="class-12-booksa927.html?mode=list" title="List" class="list">List</a>
                                                                                        </p>
            
            <div class="sort-by">
                <label>Sort By</label>
                <select onchange="setLocation(this.value)" title="Sort By">
                                            <option value="https://mybookshop.co.in/myshop/classes/class-12-books?dir=asc&order=position" selected="selected">
                            Position                        </option>
                                            <option value="class-12-books79f7.html?dir=asc&amp;order=name">
                            Name                        </option>
                                            <option value="class-12-booksa21a.html?dir=asc&amp;order=classes">
                            Classes                        </option>
                                            <option value="class-12-books3f44.html?dir=asc&amp;order=subject_attribute">
                            Subjects                        </option>
                                            <option value="class-12-booksd75a.html?dir=asc&amp;order=publishers_attribute">
                            Publishers                        </option>
                                            <option value="class-12-booksa28b.html?dir=asc&amp;order=authors_attribute">
                            Authors                        </option>
                                            <option value="class-12-booksa869.html?dir=asc&amp;order=title">
                            Title                        </option>
                                            <option value="class-12-books02be.html?dir=asc&amp;order=publisher">
                            Publisher                        </option>
                                            <option value="class-12-booksb7d8.html?dir=asc&amp;order=author">
                            Author                        </option>
                                            <option value="class-12-bookscc1a.html?dir=asc&amp;order=isbn_productcode">
                            ISBN / Product Code                        </option>
                                            <option value="class-12-books2af7.html?dir=asc&amp;order=product_category">
                            Category                        </option>
                                            <option value="class-12-booksf0a0.html?dir=asc&amp;order=standard">
                            Standard                        </option>
                                            <option value="class-12-booksdbbc.html?dir=asc&amp;order=publication_year">
                            Publication Year                        </option>
                                            <option value="class-12-bookseb58.html?dir=asc&amp;order=edition">
                            Edition                        </option>
                                            <option value="class-12-books6161.html?dir=asc&amp;order=binding">
                            Binding                        </option>
                                            <option value="class-12-books8912.html?dir=asc&amp;order=noofpages">
                            No of Pages                        </option>
                                            <option value="class-12-books58e7.html?dir=asc&amp;order=language">
                            Language                        </option>
                                            <option value="class-12-bookse934.html?dir=asc&amp;order=subject">
                            Subject                        </option>
                                            <option value="class-12-books4e8c.html?dir=asc&amp;order=board">
                            Board                        </option>
                                            <option value="class-12-books5a2e.html?dir=asc&amp;order=hsncode">
                            HSN Code                        </option>
                                            <option value="class-12-books680c.html?dir=asc&amp;order=searchkeywords">
                            Search Keywords                        </option>
                                            <option value="class-12-books805b.html?dir=asc&amp;order=booktype">
                            Book Type                        </option>
                                            <option value="class-12-booksac72.html?dir=asc&amp;order=agegroup">
                            Age Group                        </option>
                                            <option value="class-12-books084b.html?dir=asc&amp;order=company_details">
                            Company Details                        </option>
                                    </select>
                                    <a href="class-12-books00ea.html?dir=desc&amp;order=position" class="sort-by-switcher sort-by-switcher--asc" title="Set Descending Direction">Set Descending Direction</a>
                            </div>
        </div>
        <div class="pager">
        <div class="count-container">
                            <p class="amount amount--has-pages">
                    1-12 of 87                </p>
            
            <div class="limiter">
                <label>Show</label>
                <select onchange="setLocation(this.value)" title="Results per page">
                                    <option value="https://mybookshop.co.in/myshop/classes/class-12-books?limit=12" selected="selected">
                        12                    </option>
                                    <option value="class-12-books45c7.html?limit=24">
                        24                    </option>
                                    <option value="class-12-books409f.html?limit=36">
                        36                    </option>
                                </select>
            </div>
        </div>

        
    
    
        <div class="pages">
        <strong>Page:</strong>
        <ol>
        
        
        
                                    <li class="current">1</li>
                                                <li><a href="class-12-books905b.html?p=2">2</a></li>
                                                <li><a href="class-12-books2207.html?p=3">3</a></li>
                                                <li><a href="class-12-books5c7e.html?p=4">4</a></li>
                                                <li><a href="class-12-booksc471.html?p=5">5</a></li>
                    

        
        
                    <li>
                <a class="next i-next" href="class-12-books905b.html?p=2" title="Next">
                                            Next                                    </a>
            </li>
                </ol>

    </div>
    
    

    </div>
</div>

    </div>

</div>





    <div class="category-description std">
        The latest edition of Class 12 Textbooks, Class 12 Guides, Class 12 reference books as per latest CBSE Syllabus are available at our online bookstore. Explore more books    </div>
                     </div>
                <div class="col-left sidebar"><div class="block block-blog">
    <div class="block-title">
        <strong><span>Blog</span></strong>
    </div>
    <div class="block-content">
                    <div class="menu-recent">
                <h5>Recent Posts</h5>
                <ul>
                                            <li><a href="../blogs/what-is-the-importance-of-science-textbooks/index.html" >What is the Importance of Science Text Books for Students?</a></li>
                                            <li><a href="../blogs/why-books-are-important-for-child-development/index.html" >Why Books Are Important For Child Development?</a></li>
                                    </ul>
            </div>
        
                    <div class="menu-categories">
                <h5>Categories</h5>
                <ul>
                                                                <li><a href="../blogs/cat/blogs/index.html" >Blogs</a></li>
                                    </ul>
            </div>
        
            </div>
</div></div>
            </div>
        </div>
                
        <?php $this->load->view('frontend/partial/footer')?>

<div id="location-selector-wrapper" style="display: none;">
<div id="location-selector-overlay"></div>
<div id="location-selector">
<script type="text/javascript">countryRegions = {"config":{"show_all_regions":true,"regions_required":["IN"]},"IN":{"485":{"code":"ANDRA","name":"Andra Pradesh"},"487":{"code":"ASSAM","name":"Assam"},"488":{"code":"BIHAR","name":"Bihar"},"489":{"code":"CHAND","name":"Chandigarh"},"490":{"code":"CHHAT","name":"Chhattisgarh"},"493":{"code":"DELHI","name":"Delhi"},"494":{"code":"GOA","name":"Goa"},"495":{"code":"GUJAR","name":"Gujarat"},"496":{"code":"HARYA","name":"Haryana"},"497":{"code":"HP","name":"Himachal Pradesh"},"498":{"code":"JK","name":"Jammu and Kashmir"},"499":{"code":"JHARK","name":"Jharkhand"},"500":{"code":"KARNA","name":"Karnataka"},"501":{"code":"KERAL","name":"Kerala"},"503":{"code":"MP","name":"Madya Pradesh"},"504":{"code":"MAHAR","name":"Maharashtra"},"509":{"code":"ORISS","name":"Orissa"},"511":{"code":"PUNJA","name":"Punjab"},"512":{"code":"RAJAS","name":"Rajasthan"},"514":{"code":"TAMIL","name":"Tamil Nadu"},"516":{"code":"UP","name":"Uttar Pradesh"},"518":{"code":"WB","name":"West Bengal"},"519":{"code":"AN","name":"Andaman & Nicobar"},"520":{"code":"AR","name":"Arunachal Pradesh"},"521":{"code":"DD","name":"Daman & Diu"},"524":{"code":"ML","name":"Meghalaya"},"525":{"code":"MZ","name":"Mizoram"},"526":{"code":"NL","name":"Nagaland"},"523":{"code":"PU","name":"Pondicherry"},"522":{"code":"TS","name":"Telangana"},"527":{"code":"TR","name":"Tripura"},"517":{"code":"UTTAR","name":"Uttarakhand"}}}</script>
<div class="group-select"><form id="shippingzone-form" method="post" action="https://mybookshop.co.in/myshop/deliveryzone/index/index/uenc/aHR0cHM6Ly9teWJvb2tzaG9wLmNvLmluL215c2hvcC9jbGFzc2VzL2NsYXNzLTEyLWJvb2tz/">
    <h3 class="a-center">Please select your shipping location to start shopping</h3>
    <div class="col2-alt-set">
    	<div class="col-1 a-center">
    	    <span class="notice">Changing your shipping location may affect your shopping cart.</span>    	</div>
    	<div class="col-2 a-left input-box">
            <ul class="list">
                <li>
                    <div class="input-box">
                    <div style="width:200px; float:left" ><label style="width:200px;" for="shippingzone:country_id">Country</label></div>
                    <select name="shippingzone[country_id]" id="shippingzone:country_id" class="validate-select" title="Country" ><option value="" > </option><option value="IN" selected="selected" >India</option></select></div>
                </li>
                <li>
                    <div class="input-box">
                        <div style="width:200px; float:left" ><label>State/Province</label></div>
                        <select id="shippingzone:region_id" name="shippingzone[region_id]" title="State/Province" class="validate-select" style="display:none">
                            <option value="">Please select region, state or province</option>
                        </select>
                        <script type="text/javascript">
                            $('shippingzone:region_id').setAttribute('defaultValue',  "");
                        </script>
                        <input type="text" id="shippingzone:region" name="shippingzone[region]" value="" title="State/Province" class="input-text" style="display:none" />
                    </div>
                </li>
            </ul>
    	</div>
    </div>
    <div class="button-set buttons actions">
                <button class="block-poll button" onclick="$('location-selector-wrapper').hide(); return false;">
            <span class="span" style="/* background:none !important; color:#000; */">Cancel</span>
        </button> 
        <button class="button" type="submit">
            <span>Submit</span>
        </button>
    </div>
</form>
</div>
</div>
</div>
<script type="text/javascript">
	var shippingzoneRegionUpdater = new RegionUpdater('shippingzone:country_id', 'shippingzone:region', 'shippingzone:region_id', countryRegions);
	var shippingzoneForm = new VarienForm('shippingzone-form');
</script>    <div itemscope itemtype="http://schema.org/Organization">
        <meta itemprop="name" content="MyBookShop.co.in - Online School Books Store"/>        <meta itemprop="telephone" content="011 - 42750442, 9205412939"/>                <meta itemprop="email" content="info@mybookshop.co.in"/>                    <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                    <meta itemprop="addressCountry" content="India"/>                    <meta itemprop="addressLocality" content="E-119, Vishwakarma Colony"/>                    <meta itemprop="postalCode" content="110044"/>                                </div>
                <link itemprop="url" href="../index.html"/>
        <meta itemprop="sameAs" content="https://www.facebook.com/mybookshop.co.in/"/><meta itemprop="sameAs" content="https://plus.google.com/+Mybookshopcoin"/><meta itemprop="sameAs" content="https://www.linkedin.com/company/mybookshop/"/>        <meta itemprop="logo" content="https://mybookshop.co.in/myshop/skin/frontend/rwd/mytheme/images/logo_mbs.png"/>

    </div>
</div>
</body>

<!-- Mirrored from mybookshop.co.in/myshop/classes/class-12-books by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 14 Dec 2022 17:11:55 GMT -->
</html>
