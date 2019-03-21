
jQuery(function($) {


$(document).bind('ready ajaxComplete',function() {
          var slider = document.getElementById('priceSlider');
          var weight= document.getElementById('weightSlider');
          var range= document.getElementById('rangeSlider');
          var speed= document.getElementById('speedSlider');
          var battery=document.getElementById('batterySlider');
          var motor=document.getElementById('motorSlider');

          var dynamic_min_price = Number(document.getElementById('span_min').innerHTML.replace(/\D/g,''));
          var dynamic_max_price = Number(document.getElementById('span_max').innerHTML.replace(/\D/g,''));
          var dynamic_min_weight = Number(document.getElementById('span_min_weight').innerHTML.replace(/\D/g,''));
          var dynamic_max_weight = Number(document.getElementById('span_max_weight').innerHTML.replace(/\D/g,''));
          var dynamic_min_range = Number(document.getElementById('span_min_range').innerHTML.replace(/\D/g,''));
          var dynamic_max_range = Number(document.getElementById('span_max_range').innerHTML.replace(/\D/g,''));
          var dynamic_min_speed = Number(document.getElementById('span_min_topspeed').innerHTML.replace(/\D/g,''));
          var dynamic_max_speed = Number(document.getElementById('span_max_topspeed').innerHTML.replace(/\D/g,''));
          var dynamic_min_battery = Number(document.getElementById('span_min_batterysize').innerHTML.replace(/\D/g,''));
          var dynamic_max_battery = Number(document.getElementById('span_max_batterysize').innerHTML.replace(/\D/g,''));
          var dynamic_min_motor = Number(document.getElementById('span_min_motorpower').innerHTML.replace(/\D/g,''));
          var dynamic_max_motor = Number(document.getElementById('span_max_motorpower').innerHTML.replace(/\D/g,''));
          // var dynamic_array = [dynamic_min_price, dynamic_max_price, dynamic_min_weight, dynamic_max_range];
          console.log(typeof dynamic_min_price, dynamic_max_price);
  noUiSlider.create(slider, {
   start: [dynamic_min_price, dynamic_max_price],
   connect: true,
   step: 1,
   range: {
     'min': dynamic_min_price,
     'max': dynamic_max_price
   },
   ariaFormat: wNumb({
        decimals: 2
    }),
    format: wNumb({
        decimals: 2
    })
 });

  noUiSlider.create(weight, {
   start: [dynamic_min_weight, dynamic_max_weight],
   connect: true,
   step: 1,
   range: {
     'min': dynamic_min_weight,
     'max': dynamic_max_weight
   },
   ariaFormat: wNumb({
        decimals: 0
    }),
    format: wNumb({
        decimals: 0
    })
  });

  noUiSlider.create(range, {
   start: [dynamic_min_range, dynamic_max_range],
   connect: true,
   step: 1,
   range: {
     'min': dynamic_min_range,
     'max': dynamic_max_range
   },
   ariaFormat: wNumb({
        decimals: 0
    }),
    format: wNumb({
        decimals: 0
    })
  });

  noUiSlider.create(speed, {
   start: [dynamic_min_speed, dynamic_max_speed],
   connect: true,
   step: 1,
   range: {
     'min': dynamic_min_speed,
     'max': dynamic_max_speed
   },
   ariaFormat: wNumb({
        decimals: 0
    }),
    format: wNumb({
        decimals: 0
    })
  });

  noUiSlider.create(battery, {
   start: [dynamic_min_battery, dynamic_max_battery],
   connect: true,
   step: 1,
   range: {
     'min': dynamic_min_battery,
     'max': dynamic_max_battery
   },
   ariaFormat: wNumb({
        decimals: 0
    }),
    format: wNumb({
        decimals: 0
    })
  });

   noUiSlider.create(motor, {
   start: [dynamic_min_motor, dynamic_max_motor],
   connect: true,
   step: 1,
   range: {
     'min': dynamic_min_motor,
     'max': dynamic_max_motor
   },
   ariaFormat: wNumb({
        decimals: 0
    }),
    format: wNumb({
        decimals: 0
    })
  });



var span_values=[
  document.getElementById('span_min'),
  document.getElementById('span_max')
];

var span_weight_values=[
document.getElementById('span_min_weight'),
  document.getElementById('span_max_weight')


];

var span_range_values=[
document.getElementById('span_min_range'),
  document.getElementById('span_max_range')

];

var span_speed_values=[
document.getElementById('span_min_topspeed'),
  document.getElementById('span_max_topspeed')
];

var span_battery_values=[
document.getElementById('span_min_batterysize'),
  document.getElementById('span_max_batterysize')
];

var span_motor_values=[
document.getElementById('span_min_motorpower'),
  document.getElementById('span_max_motorpower')
];


slider.noUiSlider.on('update', function (values, handle) {
    span_values[handle].innerHTML = "$"+ values[handle];

    


      var price_min=values[0];
      var price_max=values[1];

      if (price_min != dynamic_min_price || price_max != dynamic_max_price)
      {
        slider.classList.remove('reset');
        widget.set_max_price(price_max);
        widget.set_min_price(price_min);
        slider.parentElement.classList.add('active');
}
      
   if (price_min == dynamic_min_price && price_max == dynamic_max_price)
      {
        slider.classList.add('reset');
        slider.parentElement.classList.remove('active');
}


  



      




});
weight.noUiSlider.on('update', function (values, handle) {
    span_weight_values[handle].innerHTML = values[handle]+'lbs';

weight.classList.remove('reset');
      var weight_min=values[0];
      var weight_max=values[1];


      
       

        if (weight_min != dynamic_min_weight || weight_max != dynamic_max_weight)
      {
        weight.classList.remove('reset');
        widget.set_max_weight(weight_max);
        widget.set_min_weight(weight_min);
        weight.parentElement.classList.add('active');
}
      
   if (weight_min == dynamic_min_weight && weight_max == dynamic_max_weight)
      {
        weight.classList.add('reset');
        weight.parentElement.classList.remove('active');
}    





});

range.noUiSlider.on('update', function (values, handle) {
    span_range_values[handle].innerHTML = values[handle]+'mi';
range.classList.remove('reset');

      var range_min=values[0];
      var range_max=values[1];


      
       
      if (range_min != dynamic_min_range || range_max != dynamic_max_range)
      {
        range.classList.remove('reset');
        widget.set_min_range(range_min);
        widget.set_max_range(range_max);
        range.parentElement.classList.add('active');
}
      
   if (range_min == dynamic_min_range && range_max == dynamic_max_range)
      {
        range.classList.add('reset');
        range.parentElement.classList.remove('active');
}    





});


speed.noUiSlider.on('update', function (values, handle) {
    span_speed_values[handle].innerHTML = values[handle]+'mph';
    speed.classList.remove('reset');

      var speed_min=values[0];
      var speed_max=values[1];


      
        

        if (speed_min != dynamic_min_speed || speed_max != dynamic_max_speed)
      {
        speed.classList.remove('reset');
        widget.set_min_speed(speed_min);
        widget.set_max_speed(speed_max);
        speed.parentElement.classList.add('active');
}
      
   if (speed_min == dynamic_min_speed && speed_max == dynamic_max_speed)
      {
        speed.classList.add('reset');
        speed.parentElement.classList.remove('active');
}    
    
});


battery.noUiSlider.on('update', function (values, handle) {
    span_battery_values[handle].innerHTML = values[handle]+'Wh';
battery.classList.remove('reset');
      var battery_min=values[0];
      var battery_max=values[1];


     
        


      if (battery_min != dynamic_min_battery || battery_max != dynamic_max_battery)
      {
        battery.classList.remove('reset');
        widget.set_min_batterysize(battery_min);
        widget.set_max_batterysize(battery_max);
        battery.parentElement.classList.add('active');
}
      
   if (battery_min == dynamic_min_battery && battery_max == dynamic_max_battery)
      {
        battery.classList.add('reset');
        battery.parentElement.classList.remove('active');
}    
     

});

motor.noUiSlider.on('update', function (values, handle) {
    span_motor_values[handle].innerHTML = values[handle]+'W';
motor.classList.remove('reset');
      var motor_min=values[0];
      var motor_max=values[1];


      
        
        if (motor_min != dynamic_min_motor || motor_max != dynamic_max_motor)
      {
        motor.classList.remove('reset');
        widget.set_min_motorpower(motor_min);
        widget.set_max_motorpower(motor_max);
        motor.parentElement.classList.add('active');
}
      
   if (motor_min == dynamic_min_motor && motor_max == dynamic_max_motor)
      {
        motor.classList.add('reset');
        motor.parentElement.classList.remove('active');
}
     


});




});
    

var clicked=false; 


   var widget=
      {

       
           min_price:'',
           max_price:'',
           min_weight:'',
           max_weight:'',
           min_speed:'',
           max_speed:'',
           min_range:'',
           max_range:'',
           min_motorpower:'',
           max_motorpower:'',
           min_batterysize:'',
           max_batterysize:'',
           temp_tag:[],
           tag:[],
          







          


           set_min_price(min) {
        this.min_price=min;
    },

     set_max_price(max) {
        this.max_price=max;
    },
    	set_min_weight(min_weight)
    	{
          this.min_weight=min_weight;
    	},

    	set_max_weight(max_weight)
    	{
          this.max_weight=max_weight;
    	},

    	set_min_speed(min_speed)
    	{
    		this.min_speed=min_speed;
    	},

    	set_max_speed(max_speed)
    	{
    		this.max_speed=max_speed;
    	},

    	set_min_range(min_range)
    	{
    		this.min_range=min_range;
    	},

    	set_max_range(max_range)
    	{
    		this.max_range=max_range;
    	},

    	set_min_motorpower(min_motorpower)
    	{
    		this.min_motorpower=min_motorpower;
    	},

    	set_max_motorpower(max_motorpower)
    	{
    		this.max_motorpower=max_motorpower;
    	},
    	set_min_batterysize(min_batterysize)
    	{
    		this.min_batterysize=min_batterysize;
    	},

    	set_max_batterysize(max_batterysize)
    	{
    		this.max_batterysize=max_batterysize;
    	},


    	set_tag(tag_element)
    	{
    		this.temp_tag.push(tag_element);


      },
      pop_tag(tag_element)
    	{
    		
            for(x=0;x<this.temp_tag.length;x++)
            {
            	if(this.temp_tag[x]== tag_element)
            	{
            		delete this.temp_tag[x];
            	}



            }},


        set_final_tags() 
        {

        	for(x=0;x<this.temp_tag.length;x++)
        	{


        		if((x in this.temp_tag))
        		{
        			this.tag.push(this.temp_tag[x]);
        		}



        	}



        }, 

        clear_final_tags()
        {
        	this.tag=[];
        	this.temp_tag=[];
        },




    		


      set_term(term)
    	{
    		this.term=term;


      },

      clear_all_terms()
      {
      	this.min_price='';
      	this.max_price='';
      	this.min_price='';
      	this.max_price='';
      	this.min_range='';
      	this.max_range='';
      	this.min_speed='';
      	this.max_speed='';
      	this.min_batterysize='';
      	this.max_batterysize='';
      	this.min_weight='';
      	this.max_weight='';
      	this.min_motorpower='';
      	this.max_motorpower='';
      	this.temp_tag=[];
        this.tag=[];

      },








      
}  


function ajax_call_clear(object)
{

var clear='clear';


var url = window.location.pathname.split('/');
	    var term=url[(url.length)-2];

           if(term % 1==0)
           {
           term=url[(url.length-4)];

           }

	    var newterm=term;


	

      newterm=term.replace("-"," ");
      newterm=newterm.replace(/\b\w/g, function(l){ return l.toUpperCase() });

	    // if(term=='scooters')
	    // {

     //      newterm='Scooters';
	    // }

	    // if(term=='electric-skateboards')
	    // {

	    //   newterm='Electric Skateboards';
	    // }

	    // if(term=='electric-unicycles')
	    // {

	    //   newterm='Electric Unicycles';
	    // }

	    // if(term=='electric-bicycles')
	    // {

	    //   newterm='Electric Bicycles';
	    // }


	    // if(term=='folding-bicycles')
	    // {

	    //   newterm='Folding Bicycles';
	    // }


	    // if(term=='compact-bicycles')
	    // {

	    //   newterm='Compact Bicycles';
	    // }


	    // if(term=='portable-scooters')
	    // {

	    //   newterm='Portable Scooters';
	    // }

	    // if(term=='human-pods')
	    // {

	    //   newterm='Human Pods';
	    // }

	    

$.ajax({
        type: 'GET',
        url: my_ajax_object.ajax_url,
        dataType: 'html',
        data: {

        	clear:'clear',
        	term:newterm,
        	
           action: 'filter_action',
           
        },
        beforeSend:function()
        {
        	console.log("Sending");
     
        	$('.load-div').removeClass("hidden");
        	 $('.products').hide();
        	 
          


        },
        success: function( data ) {
  
        $('#la_shop_products').html(data);
        console.log("Complete");
        $('.products').show();
       $('.load-div').addClass("hidden");
       object.clear_final_tags();

    
            
        },
        error: function(xhr, textStatus, errorThrown)
        {
        	console.log("Error");
        	$('.load-div').addClass("hidden");
        	     $('.products').show();
        	 console.log('STATUS: '+textStatus+'\nERROR THROWN: '+errorThrown);
        	 console.log(xhr);
        }


    });

} 


function ajax_call(object)
        {
        	 
var url = window.location.pathname.split('/');
	    var term=url[(url.length)-2];

           if(term % 1==0)
           {
           term=url[(url.length-4)];

           }

	    var newterm=term;


	


      newterm=term.replace("-"," ");
      newterm=newterm.replace(/\b\w/g, function(l){ return l.toUpperCase() });
	    // if(term=='scooters')
	    // {

     //      newterm='Scooters';
	    // }

	    // if(term=='electric-skateboards')
	    // {

	    //   newterm='Electric Skateboards';
	    // }

	    // if(term=='electric-unicycles')
	    // {

	    //   newterm='Electric Unicycles';
	    // }

	    // if(term=='electric-bicycles')
	    // {

	    //   newterm='Electric Bicycles';
	    // }


	    // if(term=='folding-bicycles')
	    // {

	    //   newterm='Folding Bicycles';
	    // }


	    // if(term=='compact-bicycles')
	    // {

	    //   newterm='Compact Bicycles';
	    // }


	    // if(term=='portable-scooters')
	    // {

	    //   newterm='Portable Scooters';
	    // }

	    // if(term=='human-pods')
	    // {

	    //   newterm='Human Pods';
	    // }

  
	  object.set_final_tags();


//handles the post requests
	    $.ajax({
        type: 'GET',
        url: my_ajax_object.ajax_url,
        dataType: 'html',
        data: {
        	
           action: 'filter_action',
           term:newterm,
           min_price:object.min_price,
           max_price:object.max_price,
           min_weight:object.min_weight,
           max_weight:object.max_weight,
           min_speed:object.min_speed,
           max_speed:object.max_speed,
           min_range:object.min_range,
           max_range:object.max_range,
           min_motorpower:object.min_motorpower,
           max_motorpower:object.max_motorpower,
           min_batterysize:object.min_batterysize,
           max_batterysize:object.max_batterysize,
           tag:object.tag
        },
        beforeSend:function()
        {
        	console.log("Sending");
     
        	$('.load-div').removeClass("hidden");
        	 $('.products').hide();
          


        },
        success: function( data ) {
  
        $('#la_shop_products').html(data);
        console.log("Complete");
        $('.products').show();
       $('.load-div').addClass("hidden");
       object.clear_final_tags();

    
            
        },
        error: function(xhr, textStatus, errorThrown)
        {
        	console.log("Error");
        	$('.load-div').addClass("hidden");
        	     $('.products').show();
        	 console.log('STATUS: '+textStatus+'\nERROR THROWN: '+errorThrown);
        	 console.log(xhr);
        }


    });
        }


    $(document).bind('ready ajaxComplete',function()
				 {
		












        var clear_filters=document.getElementById("clear_filters");
        if(clear_filters)
        {
        	$('#clear_filters').off('click').on('click',function()

        	{

        	


          var slider = document.getElementById('priceSlider');
          var weight= document.getElementById('weightSlider');
          var range= document.getElementById('rangeSlider');
          var speed= document.getElementById('speedSlider');
          var battery=document.getElementById('batterySlider');
          var motor=document.getElementById('motorSlider');

          var slider_list=[slider,weight,range,speed,battery,motor];





        	var	filter_list=document.getElementsByClassName('selected');
        	
            for(i=0;i<filter_list.length;i++)
            {
        	while(filter_list.length)
        	{
       		filter_list[i].classList.remove('selected');
}

        		
        	}

        	
          // slider.noUiSlider.reset();
          
for(var i=0;i<slider_list.length;i++)
{
  slider_list[i].noUiSlider.reset();
  slider_list[i].classList.add("reset");

}
  
        	

// //Reset price sliders
// document.getElementById("max_slider").value=3500;
// document.getElementById("min_slider").value=0;
// document.getElementById("span_min").innerHTML='$' + 0;
// document.getElementById("span_max").innerHTML='$' + 3500;
// document.getElementById("max_slider").parentElement.classList.remove('active');

// //reset weight sliders
// document.getElementById("max_slider_weight").value=100;
// document.getElementById("min_slider_weight").value=0;
// document.getElementById("span_min_weight").innerHTML=0 + ' lbs';
// document.getElementById("span_max_weight").innerHTML=100 + ' lbs';
// document.getElementById("max_slider_weight").parentElement.classList.remove('active');



// //reset topspeed sliders
// document.getElementById("max_slider_topspeed").value=50;
// document.getElementById("min_slider_topspeed").value=0;
// document.getElementById("span_min_topspeed").innerHTML=0 + ' mph';
// document.getElementById("span_max_topspeed").innerHTML=50 + ' mph';
// document.getElementById("max_slider_topspeed").parentElement.classList.remove('active');

// //range sliders
// document.getElementById("max_slider_range").value=100;
// document.getElementById("min_slider_range").value=0;
// document.getElementById("span_min_range").innerHTML=0 + ' miles';
// document.getElementById("span_max_range").innerHTML=100 + ' miles';
// document.getElementById("max_slider_range").parentElement.classList.remove('active');

// //motor power sliders
// document.getElementById("max_slider_motorpower").value=6000;
// document.getElementById("min_slider_motorpower").value=0;
// document.getElementById("span_min_motorpower").innerHTML=0 + ' W';
// document.getElementById("span_max_motorpower").innerHTML=6000 + ' W';
// document.getElementById("max_slider_motorpower").parentElement.classList.remove('active');


// //batterysize sliders

// document.getElementById("max_slider_batterysize").value=799;
// document.getElementById("min_slider_batterysize").value=0;
// document.getElementById("span_min_batterysize").innerHTML=0 + ' Wh';
// document.getElementById("span_max_batterysize").innerHTML=799 + ' Wh';
// document.getElementById("max_slider_batterysize").parentElement.classList.remove('active');



//clears the widget
widget.clear_all_terms();



	ajax_call_clear(widget);


}
        		);
        }

        
         var submit_filters=document.getElementById("submit_filters");

          if (submit_filters)
          {
            $('#submit_filters').off('click').on("click",function(e)
     {


         
  

     if ($(window).width() < 767){
      e.preventDefault();
      $('.btn-advanced-shop-filter').trigger('click');
    }
      ajax_call(widget);
		 


		 });
          }

         

		
		var min_slider=document.getElementById("min_slider")


          if(min_slider)
          {

          	min_slider.addEventListener("change", function(){
        		


		
		 

        document.getElementById("span_min").innerHTML='$' + this.value;
        var min_checker=this.value;
		var min=this.value;
		
		var max=document.getElementById("max_slider").value;
		var max_checker=max;
		var obj =this;
		var id="span_min";

	 
	   check_min(min,max,obj,250,id);

         

         if(min != 0 )
       {
       	$(this).parent().addClass('active');
       	widget.set_min_price(min);
       	widget.set_max_price(max);

       }

       else
       {
       	$(this).parent().removeClass('active');
       	
       }





  
        });


		
}
        
		
var max_slider=document.getElementById("max_slider");


if(max_slider)
{
max_slider.addEventListener("change", function(){
     

	
		 

     
     document.getElementById("span_max").innerHTML= '$' + this.value;
	 var max_price=this.value;
		var min_price=document.getElementById("min_slider").value;
	   var obj =this;
	   id="span_max";
	   check_max(min_price,max_price,obj,250,id);

       

if(max_price != 3500 )
       {
       	$(this).parent().addClass('active');
       	widget.set_min_price(min_price);
       	widget.set_max_price(max_price);
       }

       else
       {
       	$(this).parent().removeClass('active');
       
       }




});

}

var min_slider_weight=document.getElementById("min_slider_weight");

		if(min_slider_weight)
		{
			min_slider_weight.addEventListener("change", function(){

		document.getElementById("span_min_weight").innerHTML=this.value + ' lbs';
		var min=this.value;
		
		var max=document.getElementById("max_slider_weight").value;
		var obj =this;
		var id="span_min_weight"
	   check_min(min,max,obj,10,id);


    

if(min != 0)

		{

		widget.set_min_weight(min);
        widget.set_max_weight(max);	
       	$(this).parent().addClass('active');
        }

       else
       {
       	$(this).parent().removeClass('active');
       
       }

		
		
		 });
		}
		
		
		
		
		
	var max_slider_weight=document.getElementById("max_slider_weight");

	if(max_slider_weight)
	{
		max_slider_weight.addEventListener("change", function(){
		
		document.getElementById("span_max_weight").innerHTML=this.value + ' lbs';
	 var max_weight=this.value;
		var min_weight=document.getElementById("min_slider_weight").value;
	   var obj =this;
	   id="span_max_weight";
		
		check_max(min_weight,max_weight,obj,10,id);
		

if(max_weight != 100)

		{
		widget.set_max_weight(max_weight);
		widget.set_min_weight(min_weight);	
       	$(this).parent().addClass('active');
       }

       else
       {
       	$(this).parent().removeClass('active');
       
       }
		
		
		 });
	}


	
		 
		 
	var min_slider_topspeed=document.getElementById("min_slider_topspeed");

	if(min_slider_topspeed)
	{

		min_slider_topspeed.addEventListener("change", function(){
		
		document.getElementById("span_min_topspeed").innerHTML=this.value + ' mph';
		var min=this.value;
		
		var max=document.getElementById("max_slider_topspeed").value;
		var obj =this;
		var id="span_min_topspeed"
	   check_min(min,max,obj,10,id);
		
		


		if(min  != 0)

		{
		widget.set_min_speed(min);
		widget.set_max_speed(max);	
       	$(this).parent().addClass('active');
       }

       else
       {
       	$(this).parent().removeClass('active');
       
       }

		
		 });
	}

	
		
		
	var max_slider_topspeed=document.getElementById("max_slider_topspeed");

	if(max_slider_topspeed)
	{
		max_slider_topspeed.addEventListener("change", function(){
		
		document.getElementById("span_max_topspeed").innerHTML=this.value + ' mph';
	 var max=this.value;
		var min=document.getElementById("min_slider_topspeed").value;
	   var obj =this;
	   id="span_max_topspeed";
		
		check_max(min,max,obj,10,id)
		
		


		if(max != 50)

		{
		widget.set_max_speed(max);
		widget.set_min_speed(min);	
       	$(this).parent().addClass('active');
       }

       else
       {
       	$(this).parent().removeClass('active');
       
       }

	 
		 });
	}

	
		 
		 
		 
	var min_slider_range=document.getElementById("min_slider_range");

   if(min_slider_range)
   {
   	min_slider_range.addEventListener("change", function(){
		
		document.getElementById("span_min_range").innerHTML=this.value + ' miles';
		var min=this.value;
		
		var max=document.getElementById("max_slider_range").value;
		var obj =this;
		var id="span_min_range"
	   check_min(min,max,obj,10,id);
		
		


		if(min != 0)

		{
		widget.set_min_range(min);
		widget.set_max_range(max);
       	$(this).parent().addClass('active');
       }

       else
       {
       	$(this).parent().removeClass('active');
       
       }

	  
		
		 });
   }

	
		 
		 
var max_slider_range= document.getElementById("max_slider_range");

if(max_slider_range)
{
	max_slider_range.addEventListener("change", function(){
		
		document.getElementById("span_max_range").innerHTML=this.value + ' miles';
	 var max=this.value;
		var min=document.getElementById("min_slider_range").value;
	   var obj =this;
	   id="span_max_range";
		
		check_max(min,max,obj,10,id)
		

	if(max != 100)

		{
       	$(this).parent().addClass('active');
       	widget.set_max_range(max);
       	widget.set_min_range(min);
       }

       else
       {
       	$(this).parent().removeClass('active');
       
       }
		
		
		 });
}

		 
		 
var min_slider_motorpower=document.getElementById("min_slider_motorpower");

if(min_slider_motorpower)
{
	min_slider_motorpower.addEventListener("change", function(){
		
		document.getElementById("span_min_motorpower").innerHTML=this.value + ' W';
		var min=this.value;
		
		var max=document.getElementById("max_slider_motorpower").value;
		var obj =this;
		var id="span_min_motorpower"
	   check_min(min,max,obj,10,id);
		

	   if(min != 0)

		{
		widget.set_min_motorpower(min);
		widget.set_max_motorpower(max);	
       	$(this).parent().addClass('active');
       }

       else
       {
       	$(this).parent().removeClass('active');
       
       }
		
		
		 });
}

		 
		 
		var max_slider_motorpower=document.getElementById("max_slider_motorpower");


		if(max_slider_motorpower)
		{
			max_slider_motorpower.addEventListener("change", function(){
		
		document.getElementById("span_max_motorpower").innerHTML=this.value + ' W';
	 var max=this.value;
		var min=document.getElementById("min_slider_motorpower").value;
	   var obj =this;
	   id="span_max_motorpower";
		
		check_max(min,max,obj,10,id)
		


		if(max != 6000)

		{
		widget.set_max_motorpower(max);
		widget.set_min_motorpower(min);	
       	$(this).parent().addClass('active');
       }

       else
       {
       	$(this).parent().removeClass('active');
       
       }

		
		
		 });
		}

		
		 
		 
		var min_slider_batterysize=document.getElementById("min_slider_batterysize");

		if(min_slider_batterysize)
		{
			min_slider_batterysize.addEventListener("change", function(){
		
		document.getElementById("span_min_batterysize").innerHTML=this.value + ' Wh';
		var min=this.value;
		
		var max=document.getElementById("max_slider_batterysize").value;
		var obj =this;
		var id="span_min_batterysize"
	   check_min(min,max,obj,10,id);
		
		


		if(min != 0)

		{
		widget.set_min_batterysize(min);
		widget.set_max_batterysize(max);	
       	$(this).parent().addClass('active');
       }

       else
       {
       	$(this).parent().removeClass('active');
       
       }

	
		
		 });
		}

		
		 
		 
		var max_slider_batterysize=document.getElementById("max_slider_batterysize");


		if(max_slider_batterysize)

		{

			max_slider_batterysize.addEventListener("change", function(){
		
		document.getElementById("span_max_batterysize").innerHTML=this.value + ' Wh';
	 var max=this.value;
		var min=document.getElementById("min_slider_batterysize").value;
	   var obj =this;
	   id="span_max_batterysize";
		
		check_max(min,max,obj,10,id)
		
		
	      

	 if(max != 799)

		{
		widget.set_max_batterysize(max);
		widget.set_min_batterysize(min);	
       	$(this).parent().addClass('active');
       }

       else
       {
       	$(this).parent().removeClass('active');
       
       }
		
		
		 });
		}


		









		$('.comfort-a').off('click').on('click',function()
		{
			if($(this).hasClass('selected')){
				$(this).removeClass( 'selected' );
				widget.pop_tag(this.id);
				

			}
			else {
				$( this ).addClass( 'selected');
				
				widget.set_tag(this.id);
			

			
			}
			

		});

		$('.greatfor-a').off('click').on('click',function()
		{	
			if($(this).hasClass('selected')){
				$(this).removeClass( 'selected' );
				widget.pop_tag(this.id);
				
			}
			else {
				$( this ).addClass( 'selected');
				widget.set_tag(this.id);
					
			}
			

		});

		$('.tech-a').off('click').on('click',function()
		{			
			if($(this).hasClass('selected')){
				$(this).removeClass( 'selected' );
				widget.pop_tag(this.id);
			}
			else {
				$( this ).addClass( 'selected');
				widget.set_tag(this.id);	
			}
			

		});

		$('.capabilities-a').off('click').on('click',function()
		{
			if($(this).hasClass('selected')){
				$(this).removeClass( 'selected' );
				widget.pop_tag(this.id);
			}
			else {
				$( this ).addClass( 'selected');
				widget.set_tag(this.id);	
			}
			

		});
	 
	});
});



		
		






		
		
		
		
		
		function check_min(min,max,obj,offset,id)
		{
		if (parseInt(min)>parseInt(max))
	   {
	   
	   obj.value=max-offset;
	   document.getElementById(id).innerHTML=max-offset;
	   }
	   
	   if (parseInt(min)==parseInt(max))
	   {
	    obj.value=max-offset;
	   }
		}
		
		
		
		
		
		function check_max(min,max,obj,offset,id)
		{
		
		if (parseInt(max)<parseInt(min))
	   {
	   
	   
	   obj.value=parseInt(min)+offset;
	   document.getElementById(id).innerHTML=parseInt(min)+offset;
	   }
	   
	   if (parseInt(max)==parseInt(min))
	   {
	   
	   obj.value=parseInt(min)+offset;
	   
	   }
		
		}

/*New Commit*/

	
