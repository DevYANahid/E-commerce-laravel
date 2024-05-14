(function(window, document, $, undefined) {

    $(function() {
        // analytics7
        $.ajax({
            type: 'GET',
            // url: 'registered-business/',
            success: function (data) {
                // console.log(data);
                var series_data = data['series'];
                var labels_data = data['labels'];

                var analytics7 = jQuery('#analytics7')
                if (analytics7.length > 0) {
                    var options = {
                        chart: {
                            type: 'bar',
                            width: 120,
                            height: 50,
                            sparkline: {
                                enabled: true
                            }
                        },
                        colors:['#8E54E9'],
                        plotOptions: {
                            bar: {
                                columnWidth: '20%',
                                endingShape: 'rounded',
                            }
                        },
                        series: [{
                            data: series_data,
                        }],
                        labels: labels_data,
                        xaxis: {
                            crosshairs: {
                                width: 1
                            },
                        },
                        tooltip: {
                            fixed: {
                                enabled: false
                            },
                            x: {
                                show: false
                            },
                            y: {
                                title: {
                                    formatter: function (seriesName) {
                                        return ''
                                    }
                                }
                            },
                            marker: {
                                show: false
                            }
                        },
                        responsive: [{
                            breakpoint: 360,
                            options: {
                                chart: {
                                    width:60,
                                    height:60
                                }
                            },
                        },{
                            breakpoint: 480,
                            options: {
                                chart: {
                                    width:100,
                                    height:80
                                }
                            },
                        }]
                    }

                    var chart = new ApexCharts(
                        document.querySelector("#analytics7"),
                        options
                    );
                    chart.render();
                }
            }
        });

        // analytics8
        $.ajax({
            type: 'GET',
            // url: 'active-business/',
            success: function (data) {
                // console.log(data);
                var series_data = data['series'];
                var labels_data = data['labels'];

                var analytics8 = jQuery('#analytics8')
                if (analytics8.length > 0) {
                    var options = {
                        chart: {
                            type: 'bar',
                            width: 120,
                            height: 50,
                            sparkline: {
                                enabled: true
                            }
                        },
                        colors:['#2bcbba'],
                        plotOptions: {
                            bar: {
                                columnWidth: '20%',
                                endingShape: 'rounded',
                            }
                        },
                        series: [{
                            data: series_data,
                        }],
                        labels: labels_data,
                        xaxis: {
                            crosshairs: {
                                width: 1
                            },
                        },
                        tooltip: {
                            fixed: {
                                enabled: false
                            },
                            x: {
                                show: false
                            },
                            y: {
                                title: {
                                    formatter: function (seriesName) {
                                        return ''
                                    }
                                }
                            },
                            marker: {
                                show: false
                            }
                        },
                        responsive: [{
                            breakpoint: 360,
                            options: {
                                chart: {
                                    width:60,
                                    height:60
                                }
                            },
                        },{
                            breakpoint: 480,
                            options: {
                                chart: {
                                    width:100,
                                    height:80
                                }
                            },
                        }]
                    }

                    var chart = new ApexCharts(
                        document.querySelector("#analytics8"),
                        options
                    );
                    chart.render();
                }
            }
        });

        // analytics9
        $.ajax({
            type: 'GET',
            // url: 'deactivate-business/',
            success: function (data) {
                // console.log(data);
                var series_data = data['series'];
                var labels_data = data['labels'];

                var analytics9 = jQuery('#analytics9')
                if (analytics9.length > 0) {
                    var options = {
                        chart: {
                            type: 'bar',
                            width: 120,
                            height: 50,
                            sparkline: {
                                enabled: true
                            }
                        },
                        colors:['#fb0792'],
                        plotOptions: {
                            bar: {
                                columnWidth: '20%',
                                endingShape: 'rounded',
                            }
                        },
                        series: [{
                            data: series_data
                        }],
                        labels: labels_data,
                        xaxis: {
                            crosshairs: {
                                width: 1
                            },
                        },
                        tooltip: {
                            fixed: {
                                enabled: false
                            },
                            x: {
                                show: false
                            },
                            y: {
                                title: {
                                    formatter: function (seriesName) {
                                        return ''
                                    }
                                }
                            },
                            marker: {
                                show: false
                            }
                        },
                        responsive: [{
                            breakpoint: 360,
                            options: {
                                chart: {
                                    width:60,
                                    height:60
                                }
                            },
                        },{
                            breakpoint: 480,
                            options: {
                                chart: {
                                    width:100,
                                    height:80
                                }
                            },
                        }]
                    }

                    var chart = new ApexCharts(
                        document.querySelector("#analytics9"),
                        options
                    );
                    chart.render();
                }
            }
        });

        // analytics10
        $.ajax({
            type: 'GET',
            // url: 'business-position/',
            success: function (data) {
                // console.log(data);
                var series_data = data['series'];

                var analytics10 = jQuery('#analytics10')
                if (analytics10.length > 0) {

                    var optionsDonutTop = {
                        chart: {
                            height: 115,
                            width: 140,
                            type: 'donut',
                        },
                        colors: ['#1F99EF', '#8CDB19', '#EE4242'],
                        labels: ['Order', 'Delivered', 'Canceled'],
                        series: series_data,
                        legend: {
                            show: false
                        },
                        dataLabels: {
                            enabled: false
                        },
                        plotOptions: {
                            pie: {
                                size: 35,
                                donut: {
                                    size: '72%',
                                },
                                offsetX: 10,
                                offsetY: -10,
                                dataLabels: {
                                    enabled: false
                                },
                            }
                        },
                        responsive: [{
                            breakpoint: 480,
                            options: {
                                chart: {
                                    width:250,
                                    height:250
                                },
                                plotOptions: {
                                    pie: {
                                        size: 70,
                                        donut: {
                                            size: '72%',
                                        },
                                        offsetX: 0,
                                        offsetY: -20,
                                        dataLabels: {
                                            enabled: false
                                        },
                                    }
                                },
                            },
                        }]
                    }
                    var chartDonut2 = new ApexCharts(document.querySelector('#analytics10'), optionsDonutTop);
                    chartDonut2.render().then(function () {
                    });
                }
            }
        });
    });

})(window, document, window.jQuery);

(function(window, document, $, undefined){

    $(function(){
        var owlCarousel = jQuery(".owl-wrapper");
        if (owlCarousel.length > 0) {
                var owlslider = $('.owl-carousel');
                owlslider.each(function () {
                    var $this = $(this),
                        $items = ($this.data('items')) ? $this.data('items') : 1,
                        $loop = ($this.attr('data-loop')) ? $this.data('loop') : true,
                        $navdots = ($this.data('nav-dots')) ? $this.data('nav-dots') : false,
                        $navarrow = ($this.data('nav-arrow')) ? $this.data('nav-arrow') : false,
                        $autoplay = ($this.attr('data-autoplay')) ? $this.data('autoplay') : true,
                        $autospeed = ($this.attr('data-autospeed')) ? $this.data('autospeed') : 5000,
                        $smartspeed = ($this.attr('data-smartspeed')) ? $this.data('smartspeed') : 1000,
                        $autohgt = ($this.data('autoheight')) ? $this.data('autoheight') : false,
                        $space = ($this.attr('data-space')) ? $this.data('space') : 30;

                        $(this).owlCarousel({
                            loop: $loop,
                            items: $items,
                            responsive: {
                              0:{items: $this.data('xx-items') ? $this.data('xx-items') : 1},
                              480:{items: $this.data('xs-items') ? $this.data('xs-items') : 1},
                              768:{items: $this.data('sm-items') ? $this.data('sm-items') : 2},
                              980:{items: $this.data('md-items') ? $this.data('md-items') : 3},
                              1200:{items: $this.data('lg-items') ? $this.data('lg-items') : 4},
                              1400:{items: $this.data('xl-items') ? $this.data('lg-items') : 5},
                            },
                            dots: $navdots,
                            autoplayTimeout:$autospeed,
                            smartSpeed: $smartspeed,
                            autoHeight:$autohgt,
                            margin:$space,
                            nav: $navarrow,
                            navText:["<i class='fa fa-angle-left fa-2x'></i>","<i class='fa fa-angle-right fa-2x'></i>"],
                            autoplay: $autoplay,
                            autoplayHoverPause: true
                        });
                   });
        }
    });

})(window, document, window.jQuery);
(function(window, document, $, undefined){

    $(function(){
        var popOvers = jQuery(".popover-wrapper");
        if (popOvers.length > 0) {
            $('[data-toggle="popover"]').popover()
        }
    });

})(window, document, window.jQuery);
(function(window, document, $, undefined){

    $(function(){
        jQuery(".loader").fadeOut('slow');
    });

})(window, document, window.jQuery);

(function(window, document, $, undefined){

    $(function(){
        var scrollbar = jQuery(".scrollbar");
        if (scrollbar.length > 0) {
                $('.scroll_dark').mCustomScrollbar({
                  theme:"minimal-dark",
                  setHeight: false,
                  mouseWheel: {
                    normalizeDelta: true,
                    scrollAmount: '200px',
                    contentTouchScroll: true,
                    deltaFactor: '200px'
                  },
                  advanced: {
                    autoScrollOnFocus: 'a[tabindex]'
                  }
                });
                $('.scroll_light').mCustomScrollbar({
                  theme:"minimal",
                  setHeight: false,
                  mouseWheel: {
                    normalizeDelta: true,
                    scrollAmount: '200px',
                    contentTouchScroll: true,
                    eltaFactor: '200px'
                  },
                  advanced: {
                    autoScrollOnFocus: 'a[tabindex]'
                  }
                });
        }
    });

})(window, document, window.jQuery);
(function(window, document, $, undefined){

    $(function(){
        var sidebarNav = jQuery(".sidebar-nav");
        if (sidebarNav.length > 0) {
                $('#sidebarNav').metisMenu();
        }
    });

})(window, document, window.jQuery);
(function(window, document, $, undefined){

    $(function(){
        var tootlTips = jQuery(".tooltip-wrapper");
        if (tootlTips.length > 0) {
            $('[data-toggle="tooltip"]').tooltip();
        }
    });

})(window, document, window.jQuery);
(function(window, document, $, undefined){

    $(function(){
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
              form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                  event.preventDefault();
                  event.stopPropagation();
                }
                form.classList.add('was-validated');
              }, false);
            });
          }, false);

          getSelectorFromElement: function getSelectorFromElement(element) {
            var selector = element.getAttribute('data-target');

            if (!selector || selector === '#') {
              selector = element.getAttribute('href') || '';
            }

            try {
              return document.querySelector(selector) ? selector : null;
            } catch (err) {
              return null;
            }
        }
    });


    $('.mobile-toggle').on('click', function() {
        $('body').toggleClass('sidebar-toggled');
      });

      $(document).on('click', '.mega-menu.dropdown-menu', function (e) {
        e.stopPropagation();
      });


    $('.addNewCategoryBtn').on('click',function () {
        $('#AddNewCategoryModal').modal('show');
    });

    // *********** Category ***********

    $('.categoryEditBtn').on('click',function () {
        var categoryId = $(this).parent().parent().parent().parent().attr('id');

        $.ajax({
            type: 'Get',
            url: '/admin/category/'+ categoryId +'/edit',
            success: function (data) {
                // console.log(data);
                var categoryName = data['category_name'];
                $('#updateCategoryName').val(categoryName);
                $('.updateCategoryForm').attr('action','/admin/category/'+ categoryId)
            }
        });

        document.getElementsByClassName('updateCategoryAndSubcategoryTitle')[0].innerText = 'Update Category';
        document.getElementsByClassName('updateCategoryAndSubcategoryFormLabel')[0].innerHTML = 'Write A Category Name <span class="text-warning"><i class="fa fa-star"></i></span>';
        $('.updateCategoryAndSubcategoryFormInput').attr('name','category_name')

        $('#updateCategoryAndSubcategoryModal').modal('show');
        // updateCategoryName
    });

    $('.categoryDeleteBtn').on('click',function () {
        var categoryId = $(this).parent().parent().parent().parent().attr('id');

        var category_id_array = new Array();
        $('#categoryList .category').each(function () {
            category_id_array.push($(this).attr('id'));
        });


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'Post',
            url: 'destroy-category/'+categoryId,
            data: {
                'category_id': category_id_array,
            },
            success: function (data) {
                // console.log(data);
                $('.successMessageFormJavascript').removeClass('d-none');
                var message = document.getElementsByClassName('successMessageFormJavascript')[0];
                message.getElementsByTagName('span');
                message.getElementsByTagName('span')[0].innerText = 'category deleted successfully';

                $('.javascriptMessageClose').on('click',function () {
                    $('.successMessageFormJavascript').addClass('d-none');
                });

                setTimeout(windowRelode , 1000);
            }
        });
    });

    function windowRelode() {
        location.reload();
    }

    $('#categoryList').sortable({
        placeholder: 'ul-state-highlight',
        update: function (event,ui) {
            var category_id_array = new Array();
            $('#categoryList .category').each(function () {
                category_id_array.push($(this).attr('id'));
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'Post',
                url: 'update-category-index',
                data: {
                    'category_id': category_id_array,
                },
                success: function (data) {
                    // console.log(data);
                    $('.successMessageFormJavascript').removeClass('d-none');
                    var message = document.getElementsByClassName('successMessageFormJavascript')[0];
                    message.getElementsByTagName('span');
                    message.getElementsByTagName('span')[0].innerText = 'category indexing updated successfully';

                    $('.javascriptMessageClose').on('click',function () {
                        $('.successMessageFormJavascript').addClass('d-none');
                    });

                    setTimeout(windowRelode , 1000);
                }
            });
        }
    });

    $('.categoryDeleteBtn').on('click',function () {
        var categoryId = $(this).parent().parent().parent().parent().attr('id');

        var category_id_array = new Array();
        $('#categoryList .category').each(function () {
            category_id_array.push($(this).attr('id'));
        });


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'Post',
            url: 'destroy-category/'+categoryId,
            data: {
                'category_id': category_id_array,
            },
            success: function (data) {
                // console.log(data);
                $('.successMessageFormJavascript').removeClass('d-none');
                var message = document.getElementsByClassName('successMessageFormJavascript')[0];
                message.getElementsByTagName('span');
                message.getElementsByTagName('span')[0].innerText = 'category deleted successfully';

                $('.javascriptMessageClose').on('click',function () {
                    $('.successMessageFormJavascript').addClass('d-none');
                });

                setTimeout(windowRelode , 1000);
            }
        });
    });

    // *********** Subcategory ***********

    $('.subcategoryEditBtn').on('click',function () {
        var subcategoryId = $(this).parent().parent().parent().parent().attr('id');

        $.ajax({
            type: 'Get',
            url: '/admin/subCategory/'+ subcategoryId +'/edit',
            success: function (data) {
                // console.log(data);
                var subcategoryName = data['name'];
                $('#updateCategoryName').val(subcategoryName);
                $('.updateCategoryForm').attr('action','/admin/subCategory/'+ subcategoryId)
            }
        });

        document.getElementsByClassName('updateCategoryAndSubcategoryTitle')[0].innerText = 'Update Subcategory';
        document.getElementsByClassName('updateCategoryAndSubcategoryFormLabel')[0].innerHTML = 'Write A Subcategory Name <span class="text-warning"><i class="fa fa-star"></i></span>';
        $('.updateCategoryAndSubcategoryFormInput').attr('name','subcategory_name')

        $('#updateCategoryAndSubcategoryModal').modal('show');
        // updateCategoryName
    });

    $('#subCategoryList').sortable({
        placeholder: 'ul-state-highlight',
        update: function (event,ui) {
            var subcategory_id_array = new Array();
            $('#subCategoryList .subcategory').each(function () {
                subcategory_id_array.push($(this).attr('id'));
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'Post',
                url: 'update-subcategory-index',
                data: {
                    'subcategory_id': subcategory_id_array,
                },
                success: function (data) {
                    // console.log(data);
                    $('.successMessageFormJavascript').removeClass('d-none');
                    var message = document.getElementsByClassName('successMessageFormJavascript')[0];
                    message.getElementsByTagName('span');
                    message.getElementsByTagName('span')[0].innerText = 'subcategory indexing updated successfully';

                    $('.javascriptMessageClose').on('click',function () {
                        $('.successMessageFormJavascript').addClass('d-none');
                    });

                    setTimeout(windowRelode , 1000);
                }
            });
        }
    });

    $('.subcategoryDeleteBtn').on('click',function () {
        var subcategoryId = $(this).parent().parent().parent().parent().attr('id');

        var subcategory_id_array = new Array();
        $('#subCategoryList .subcategory').each(function () {
            subcategory_id_array.push($(this).attr('id'));
        });


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'Post',
            url: 'destroy-subcategory/'+subcategoryId,
            data: {
                'subcategory_id': subcategory_id_array,
            },
            success: function (data) {
                // console.log(data);
                $('.successMessageFormJavascript').removeClass('d-none');
                var message = document.getElementsByClassName('successMessageFormJavascript')[0];
                message.getElementsByTagName('span');
                message.getElementsByTagName('span')[0].innerText = 'subcategory deleted successfully';

                $('.javascriptMessageClose').on('click',function () {
                    $('.successMessageFormJavascript').addClass('d-none');
                });

                // setTimeout(windowRelode , 1000);
            }
        });
    });

    // *********** Product ***********

    // *** Product Color ***
    $('.addProductColorBtn').on('click',function () {
        // var colorRows = document.getElementsByClassName('colorRow');
        // var sizeRows = document.getElementsByClassName('sizeRow');
        //
        // $('#productPrice').attr('readonly','readonly');
        //
        // if (sizeRows.length == 0 && colorRows.length == 0) {
        //     $('#productPrice').val('');
        // }

        $('.addProductColorRow').append('<div class="form-row colorRow mx-auto">\n' +
            // '    <div class="form-group col-sm-1">\n' +
            // '        <label for="mainPrice"></label>\n' +
            // '        <br>\n' +
            // '        <input type="radio" name="main_price" id="mainPrice">\n' +
            // '    </div>\n' +
            // '\n' +
            '    <div class="form-group col-sm-4">\n' +
            '        <label for="productColor">Color</label>\n' +
            '        <input class="form-control" type="color" name="color_colde[]" id="productColor" required>\n' +
            '    </div>\n' +
            '\n' +
            '    <div class="form-group col-sm-6">\n' +
            '        <label for="productColorName">Color Name</label>\n' +
            '        <input class="form-control text-capitalize" type="text" name="color_name[]" id="productColorName" required>\n' +
            '    </div>\n' +
            '\n' +
            // '    <div class="form-group col-sm-3">\n' +
            // '        <label for="productColorName">Color Price</label>\n' +
            // '        <input class="form-control" step="0.01" type="number" name="color_price[]" id="productColorPrice" required>\n' +
            // '    </div>\n' +
            // '\n' +
            '    <div class="form-group col-sm-2">\n' +
            '        <label for="productColorName">Action</label>\n' +
            '        <button type="button" class="cancelProductColorBtn btn btn-danger btn-social-sm"><i class="fa fa-times"></i></button>\n' +
            '    </div>\n' +
            '</div>\n')
    });

    // $('.addProductColorRow').on('click','#mainPrice',function () {
    //     var mainPrice = $(this).parent().parent().find('#productColorPrice').val();
    //     $('#productPrice').val(mainPrice);
    // });

    $('.addProductColorRow').on('click','.cancelProductColorBtn',function (e) {
        e.preventDefault();
       $(this).parent().parent().remove();
        // var colorRows = document.getElementsByClassName('colorRow');
        // var sizeRows = document.getElementsByClassName('sizeRow');
        //
        // if (colorRows.length < 1 && sizeRows.length < 1){
        //     // $('.productPriceGroup').empty().append('<label for="productPrice">Write Product price</label>\n' +
        //         // '<input class="form-control" type="number" name="price" id="productPrice">')
        //     $('#productPrice').removeAttr('readonly');
        // }
    });

    // *** Product size ***

    $('.addProductSizeBtn').on('click',function () {
        // var colorRows = document.getElementsByClassName('colorRow');
        // var sizeRows = document.getElementsByClassName('sizeRow');
        //
        // $('#productPrice').attr('readonly','readonly');
        //
        // if (sizeRows.length == 0 && colorRows.length == 0) {
        //     $('#productPrice').val('');
        // }

        $('.addProductSizeRow').append('<div class="form-row sizeRow mx-auto">\n' +
            // '    <div class="form-group col-sm-1">\n' +
            // '        <label for="mainPrice"></label>\n' +
            // '        <br>\n' +
            // '        <input type="radio" name="main_price" id="mainPrice">\n' +
            // '    </div>\n' +
            '\n' +
            '    <div class="form-group col-sm-10">\n' +
            '        <label for="productSizeName">Size</label>\n' +
            '        <input class="form-control text-uppercase" type="text" name="size[]" id="productSizeName" required>\n' +
            '    </div>\n' +
            '\n' +
            // '    <div class="form-group col-sm-4">\n' +
            // '        <label for="productSizePrice">Size Price</label>\n' +
            // '        <input class="form-control" step="0.01" type="number" name="size_price[]" id="productSizePrice" required>\n' +
            // '    </div>\n' +
            '\n' +
            '    <div class="form-group col-sm-2">\n' +
            '        <label for="productColorName">Action</label>\n' +
            '        <button type="button" class="cancelProductSizeBtn btn btn-danger btn-social-sm"><i class="fa fa-times"></i></button>\n' +
            '    </div>\n' +
            '</div>');

    });

    // $('.addProductSizeRow').on('click','#mainPrice',function () {
    //     var mainPrice = $(this).parent().parent().find('#productSizePrice').val();
    //     $('#productPrice').val(mainPrice);
    // });

    $('.addProductSizeRow').on('click','.cancelProductSizeBtn',function (e) {
        e.preventDefault();
        $(this).parent().parent().remove();
        // var colorRows = document.getElementsByClassName('colorRow');
        // var sizeRows = document.getElementsByClassName('sizeRow');
        //
        // if (sizeRows.length < 1 && colorRows.length < 1){
        //     // $('.productPriceGroup').empty().append('<label for="productPrice">Write Product price</label>\n' +
        //     //     '<input class="form-control" type="number" name="price" id="productPrice">')
        //     $('#productPrice').removeAttr('readonly');
        // }
    });

    // *** Product image ***

    $('.input-product-image').imageUploader({
        imagesInputName: 'product_image',
        maxFiles: 1
    });

    // *** update Product image ***

    $('.productImageBtn').on('click',function () {
        $('#updateProductImageModel').modal('show');
    })

    // *** delete Product image ***

    $('.deleteProductBtn').on('click',function () {
        var productId = $(this).attr('id');

        $.ajax({
            type: 'Get',
            url: '/admin/product/'+ productId,
            success: function (data) {
                // console.log(data);
                var productName = data['name'];
                console.log(productName);
                document.getElementsByClassName('deleteProductIitleForShow')[0].innerText = 'are you sure! you want to delete ('+ productName + ')';
            }
        });
        $('.deleteProductForm').attr('action','/admin/product/'+ productId);
        $('#deleteProductModel').modal('show');
    });

    // insert logo image
    $('.logoInsertBtn').on('click',function () {
        $('#addLogoModel').modal('show');
        var active = $(this).closest('li').addClass('active');
        $('.closeModalBtn').on('click',function (){
            active.removeClass('active');
        });
    });

    $('.input-logo-image').imageUploader({
        imagesInputName: 'company_logo',
        maxFiles: 1
    });

    // insert banner image
    $('.addBannerSliderBtn').on('click',function () {
        $('#addBannerSliderModel').modal('show');

    });

    $('.input-banner-image').imageUploader({
        imagesInputName: 'company_banner',
        maxFiles: 3
    });

    // update banner image
    $('.bannerActionBtn').on('click',function () {
        var id = $(this).attr('alt');
        $('#updateBannerSliderModel').modal('show');
        $('.updateBannerSliderForm').attr('action','/admin/mainBannerScroll/'+id);
    });

    $('.update-banner-image').imageUploader({
        imagesInputName: 'company_banner',
        maxFiles: 1
    });


    // insert menu slider image
    $('.addMenuSliderBtn').on('click',function () {
        $('#addMenuSliderModel').modal('show');

    });

    $('.input-Menu-image').imageUploader({
        imagesInputName: 'company_menu_slider',
        maxFiles: 3
    });

    // update menu slider image
    $('.menuBMenuActionBtn').on('click',function () {
        var id = $(this).attr('alt');
        $('#updateMenuSliderModel').modal('show');
        $('.updateMenuSliderForm').attr('action','/admin/menuSlider/'+id);
    });

    $('.update-Menu-image').imageUploader({
        imagesInputName: 'company_menu_slider',
        maxFiles: 1
    });

    // select country
    var pathname = window.location.pathname;
    if (pathname == '/admin/setting') {
        $('.multipleCountrySelect').select2();

        $.ajax({
            type: 'Get',
            url: '/admin/selected-country',
            success: function (data) {
                // console.log(data);
                var selectedCountry = data;
                $('.multipleCountrySelect').val(selectedCountry).trigger('change');
            }
        });
    }

    // add text slider
    $('.addTextSliderBtn').on('click',function () {
        $('.addTextSliderBtn').parent().parent().find('.card-body').removeClass('d-none');
        $('.addMetaContentInput').append('<label for="title">Meta Title</label>\n' +
            '<input class="form-control" type="text" name="title[]" id="title">')
    });

    // select payments
    var pathname = window.location.pathname;
    if (pathname == '/admin/setting') {
        $('.multiplePaymentSelect').select2();

        $.ajax({
            type: 'Get',
            url: '/admin/selected-payment',
            success: function (data) {
                // console.log(data);
                var selectedPayment = data;
                $('.multiplePaymentSelect').val(selectedPayment).trigger('change');
            }
        });
    }

})(window, document, window.jQuery);
