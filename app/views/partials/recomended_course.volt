<style>
    .glyphicon { margin-right:5px; }
    .thumbnail
    {
        margin-bottom: 20px;
        padding: 0px;
        -webkit-border-radius: 0px;
        -moz-border-radius: 0px;
        border-radius: 0px;
    }

    .item.list-group-item
    {
        float: none;
        width: 100%;
        background-color: #fff;
        margin-bottom: 10px;
    }
    .item.list-group-item:nth-of-type(odd):hover,.item.list-group-item:hover
    {
        background: #428bca;
    }

    .item.list-group-item .list-group-image
    {
        margin-right: 10px;
    }
    .item.list-group-item .thumbnail
    {
        margin-bottom: 0px;
    }
    .item.list-group-item .caption
    {
        padding: 9px 9px 0px 9px;
    }
    .item.list-group-item:nth-of-type(odd)
    {
        background: #eeeeee;
    }

    .item.list-group-item:before, .item.list-group-item:after
    {
        display: table;
        content: " ";
    }

    .item.list-group-item img
    {
        float: left;

    }

    .item.list-group-item:after
    {
        clear: both;
    }
    .list-group-item-text
    {
        margin: 0 0 11px;
		height:60px;
    }
	#sticky.affix {
	        position: fixed;
	        top: 100px;
	        width: 100%
	    }
	 .thumbnail:hover
	    {
	         background: #ece9f2;
	    }
</style>
<div class="divider">&nbsp</div>
<div class="well well-sm" >
    <p style="font-size:16px" class="pull-left"><strong>Course</strong></p>
    <div class="btn-group pull-right">
        <a href="#" id="list_recomended" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list"></span>
        List
        </a>
            <a href="#" id="grid_recomended" class="btn btn-default btn-sm"><span
                class="glyphicon glyphicon-th"></span>Grid</a>
    </div>
	<p>&nbsp</p>
</div>
<div class="page-header">
	<h3><b>Recomended</b></h3>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">

    <div id="products" class="row-sm list-group">
            <?php if($course)
                {
                    foreach($course as $Course)
                        {
            ?>
            <div class="item  col-xs-12 col-lg-4">

<div id="products" class="row-sm list-group">
    <div class="item  col-xs-12 col-lg-4">
        <div class="thumbnail">
            <img class="group list-group-image" src="<?php echo $this->url->get('img/images.jpg'); ?>" alt="" style="width:250px;height:160px" />
            <div class="caption">
                <h4 class="group inner list-group-item-heading">
                    <b>Product titles</b></h4>
                <p class="group inner list-group-item-text" style="height:120px">
                    Product description... Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                    sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                    </p>
                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <p class="lead">
                            $21.000</p>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <a class="btn btn-success" href="cart.php">Add to cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
      <div class="item  col-xs-12 col-lg-4">
            <div class="thumbnail">
                <img class="group list-group-image" src="<?php echo $this->url->get('img/images.jpg'); ?>" alt="" style="width:250px;height:160px" />
                <div class="caption">
                    <h4 class="group inner list-group-item-heading">
                        <b>Product titles</b></h4>
                    <p class="group inner list-group-item-text" style="height:120px">
                        Product description... Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                        sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                        </p>
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <p class="lead">
                                $21.000</p>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <a class="btn btn-success" href="cart.php">Add to cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      <div class="item  col-xs-12 col-lg-4">
            <div class="thumbnail">
                <img class="group list-group-image" src="<?php echo $this->url->get('img/images.jpg'); ?>" alt="" style="width:250px;height:160px" />
                <div class="caption">
                    <h4 class="group inner list-group-item-heading">
                        <b>Product titles</b></h4>
                    <p class="group inner list-group-item-text" style="height:120px">
                        Product description... Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                        sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                        </p>
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <p class="lead">
                                $21.000</p>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <a class="btn btn-success" href="cart.php">Add to cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      <div class="item  col-xs-12 col-lg-4">
            <div class="thumbnail">
                <img class="group list-group-image" src="<?php echo $this->url->get('img/images.jpg'); ?>" alt="" style="width:250px;height:160px" />
                <div class="caption">
                    <h4 class="group inner list-group-item-heading">
                        <b>Product titles</b></h4>
                    <p class="group inner list-group-item-text" style="height:120px">
                        Product description... Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                        sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                        </p>
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <p class="lead">
                                $21.000</p>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <a class="btn btn-success" href="cart.php">Add to cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      <div class="item  col-xs-12 col-lg-4">
            <div class="thumbnail">
                <img class="group list-group-image" src="<?php echo $this->url->get('img/images.jpg'); ?>" alt="" style="width:250px;height:160px" />
                <div class="caption">
                    <h4 class="group inner list-group-item-heading">
                        <b>Product titles</b></h4>
                    <p class="group inner list-group-item-text" style="height:120px">
                        Product description... Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                        sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                        </p>
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <p class="lead">
                                $21.000</p>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <a class="btn btn-success" href="cart.php">Add to cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
          <div class="item  col-xs-12 col-lg-4">

                <div class="thumbnail">
                    <img class="group list-group-image" src="<?php echo $this->url->get('img/images.jpg'); ?>" alt="" style="width:250px;height:160px" />
                    <div class="caption">
                    <a href="<?php echo "#";?>">
                        <h4 class="group inner list-group-item-heading">
                            <b><?php echo ucfirst($Course['name']); ?></b></h4>
                            </a>
                        <p class="group inner list-group-item-text" style="height:120px">
                            Product description... Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                            sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                            </p>
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <p class="lead">
                                    $ <?php echo $Course['price']; ?></p>
                            </div>
                            <div class="col-xs-12 col-md-4">
                                <a class="btn btn-success" href="cart.php">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php } } ?>
    </div>

          <div class="item  col-xs-12 col-lg-4">
                <div class="thumbnail">
                    <img class="group list-group-image" src="<?php echo $this->url->get('img/images.jpg'); ?>" alt="" style="width:250px;height:160px" />
                    <div class="caption">
                        <h4 class="group inner list-group-item-heading">
                            <b>Product titles</b></h4>
                        <p class="group inner list-group-item-text" style="height:120px">
                            Product description... Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                            sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                            </p>
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <p class="lead">
                                    $21.000</p>
                            </div>
                            <div class="col-xs-12 col-md-4">
                                <a class="btn btn-success" href="cart.php">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          <div class="item  col-xs-12 col-lg-4">
                <div class="thumbnail">
                    <img class="group list-group-image" src="<?php echo $this->url->get('img/images.jpg'); ?>" alt="" style="width:250px;height:160px" />
                    <div class="caption">
                        <h4 class="group inner list-group-item-heading">
                            <b>Product titles</b></h4>
                        <p class="group inner list-group-item-text" style="height:120px">
                            Product description... Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                            sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                            </p>
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <p class="lead">
                                    $21.000</p>
                            </div>
                            <div class="col-xs-12 col-md-4">
                                <a class="btn btn-success" href="cart.php">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          <div class="item  col-xs-12 col-lg-4">
                <div class="thumbnail">
                    <img class="group list-group-image" src="<?php echo $this->url->get('img/images.jpg'); ?>" alt="" style="width:250px;height:160px" />
                    <div class="caption">
                        <h4 class="group inner list-group-item-heading">
                            <b>Product titles</b></h4>
                        <p class="group inner list-group-item-text" style="height:120px">
                            Product description... Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                            sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                            </p>
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <p class="lead">
                                    $21.000</p>
                            </div>
                            <div class="col-xs-12 col-md-4">
                                <a class="btn btn-success" href="cart.php">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          <div class="item  col-xs-12 col-lg-4">
                <div class="thumbnail">
                    <img class="group list-group-image" src="<?php echo $this->url->get('img/images.jpg'); ?>" alt="" style="width:250px;height:160px" />
                    <div class="caption">
                        <h4 class="group inner list-group-item-heading">
                            <b>Product titles</b></h4>
                        <p class="group inner list-group-item-text" style="height:120px">
                            Product description... Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                            sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                            </p>
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <p class="lead">
                                    $21.000</p>
                            </div>
                            <div class="col-xs-12 col-md-4">
                                <a class="btn btn-success" href="cart.php">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>

</div>
<div class="divider"></div>


<script type="text/javascript">
    $(document).ready(function() {
        $('#list_recomended').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
        $('#grid_recomended').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
    });
</script>
