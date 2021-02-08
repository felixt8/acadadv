<!DOCTYPE html>
<html lang="en">

<head>
<title> Universiti Malaysia Sabah </title>


<!--meta-->
<meta charset="UTF-8">
<meta name="description" content="University webpage">
<meta name="keywords" content="ums">

<!--Responsive Page-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!--UMS Logo Site-->
<link href="<?php echo base_url()?>public/img/umslogo.png" rel="icon">

<!--[if lt IE 9 -->
<!--[<script src="https://oss.maxcdn.com/html5shiv/3.\.2/html5shiv.min.js"> </script>-->
<!--[<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"> </script>-->
<!--[endif]-->

<!--Google fonts-->
<link href="https://fonts.googleapis.com/css?family=Bree+Serif:400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Style Sheet-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="<?php base_url()?>public/css/flaticon.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php base_url()?>public/css/home_css.css">
<link rel="stylesheet" href="<?php base_url()?>public/css/chat.css">



<!-- javascript & JQuery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/3.0.0/handlebars.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/1.1.1/list.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="<?php base_url()?>public/js/owl.carousel.min.js"></script>
<script src="<?php base_url()?>public/js/circle-progress.min.js"></script>
</head>



<body>
<!----------------Header---------------------->
<header class="header-section">

<a href ="http://localhost/fyproj/">	
<div class="ums-logo">
	<img src="<?php base_url()?>public/img/logo.png" alt="faculty logo" >
</div>
</a>

<div class="ir-logo">
	<img src="<?php base_url()?>public/img/ir-logo.png" alt="IR4.0 logo" >
</div>

</header>


 
<section class="intro-section set-bg">

<div class="intro-content">
	<!-- Content -->
	<?php foreach($FACULTY as $fac){?>
	
	<div class="fac-slot">
	<a href ='<?php echo base_url() ?>fac_pg/index/<?php echo $fac->FacID ?>'>
	<?php
		echo '<img src="data:image/jpeg;base64,'.base64_encode( $fac->FacPic ).'" height="200" width="200" />';
	?>
	<h3><?=$fac->FacName;?></h3>
	</a>
	</div>
	
    <?php }?>  				
					
	
	<i class="open-button fa fa-commenting-o fa-2x" onclick="openForm()"></i>

	<div class="chat-popup" id="myForm">
	  <div class="form-container">
		<h3 style="display:inline;">Chat Assistant</h3>
		<a i class="fa fa-times" onclick="closeForm()" style="display:inline; float:right;"></a>
		<div class="chat">
		<div class="chat-history">
		<ul>
        <li>
            <div class="message my-message">
              Hi, I am Academic Chat Assistant.
            </div>
        </li>
        <li>
           <div class="message my-message">
              I can help you on elective courses recommendation based on your answer.
           </div>
         </li>
		</ul>
		</div>

		<textarea name="message-to-send" id="message-to-send" placeholder="Type message.." ></textarea>
		
		<button i="button" i class="btn fa fa-send-o"></i></button>
		</div>
	  </div>
	</div>
	
</div>
</section>

<section class="spadBtm">
	<div class="container">
		<div class="row">
			
			<!--ums logo-->
			<div class="col-lg-2">
				<div class="ums-logo">
					<img src="<?php base_url()?>public/img/umslogo.png" alt="university logo" style="width:120px;height:120px;">						
				</div>
			<div class="eco-campus" style="margin-top:20px;">
					<img src="<?php base_url()?>public/img/eco-campus-logo.png" alt="eco campus logo" style="width:170px; height: 100px;">
				</div>
			</div>
			
			
			<!--socialmedia-->
			<div class="col-lg-4">
				<div class="contact">
					<h2> Follow Us </h2>
						<ul class="social">
							<li><a href="https://twitter.com/UMS_EcoCampus" i class="fa fa-twitter" style="color:#fff;"></i><span class="label"></a></li>
							<li><a href="https://www.facebook.com/FCI.UMS/" i class="fa fa-facebook" style="color:#fff;"></i><span class="label"></a></li>
							<li><a href="https://www.linkedin.com/school/umsofficial/" i class="fa fa-linkedin" style="color:#fff;"></i><span class="label"></a></li>
							<li><a href="https://www.youtube.com/channel/UCkriQ1ronfQofaoVH1qYk8A" i class="fa fa-youtube" style="color:#fff;"></i><span class="label"></a></li>
						</ul>
						
				</div>
			</div>
			
			<!--second -->
			<div class="col-lg-3">
				<div class="umskk">
					<h5 class="heading"><u>UMS-KK</u></h5>	
					<p> Faculty Of Computing and Informatics</p>
					<p>University Malaysia Sabah</p>
					<p>Jalan UMS,</p>
					<p>8400 Kota Kinabalu,Sabah, Malaysia</p>
					<p></p>
					<p>Tel : (+6088) 320000  Ext.: 613708 / 613710</p>
					<p>Fax : (+6088) 320390</p>
					<p>Email: pejfki@ums.edu.my</p>
				</div>
			</div>
			
	
			<!--third-->
			<div class="col-lg-3">
				<div class="umskal">
					<h5 class="heading"><u>UMS-KAL</u></h5>	
					<p> Faculty Of Computing and Informatics</p>
					<p>University Malaysia Sabah</p>
					<p>Labuan International Campus,</p>
					<p>Jalan Sungai Pagar,</p>
					<p>87000 Labuan F.T., Malaysia</p>
					<p></p>
					<p>Tel: (+6087) 460445</p>
					<p>Fax: (+6087) 465155</p>
					<p>Email: pejfki@ums.edu.my</p>
				</div>
			</div>
		</div>
	</div>
		
</section>


<script>
<!--Chat-->
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>


<script id="message-template" type="text/x-handlebars-template">
  <li class="clearfix">
    <div class="message other-message float-right">
      {{messageOutput}}
    </div>
  </li>
</script>

<script id="message-response-template" type="text/x-handlebars-template">
  <li>
    <div class="message my-message float-left">
      {{response}}
    </div>
  </li><br/><br/><br/>
</script>

<script id="message-answer-template" type="text/x-handlebars-template">
  <li>
    <div class="message my-message float-left">
      The courses recommend are 
	  {{#each answer}}
	  {{link name url}} {{score}}, 
	  {{/each}}
    </div>
  </li><br/><br/><br/>
</script>

<script>
(function(){
	Handlebars.registerHelper("link", function(text, url) {
      var url = Handlebars.escapeExpression(url),
          text = Handlebars.escapeExpression(text)
          
     return new Handlebars.SafeString("<a href='" + url + "'>" + text +"</a>");
	});
	kw=[];
	var pass;
	var quest;
	result=[];
	asked=[];
	var next=false;
	var again=true;
	var terminate=false;
	var empty=false;
	var prog='';
	var chat = {
    messageToSend: '',
    messageResponses: [
      'What is your personal strength? eg. problem solving, good at math etc.',
      'Any courses or topics that you interested? Can you name it for me?',
      'What is your career field/job for future?',
      'What courses you had learned before that related to your program? Can you name it?',
      'Did you have any skills/experiences related to your program? Please name it.',
      'Sorry, I am not able to recommend courses to you. Please give me more information in order to recommend.'
    ],
	scrollToBottom: function() {
       this.$chatHistory.scrollTop(this.$chatHistory[0].scrollHeight);
    },
    init: function() {
      this.cacheDOM();
      this.bindEvents();
      this.render();
    },
    cacheDOM: function() {
      this.$chatHistory = $('.chat-history');
      this.$button = $('button');
      this.$textarea = $('#message-to-send');
      this.$chatHistoryList =  this.$chatHistory.find('ul');
    },
    bindEvents: function() {
      this.$button.on('click', this.addMessage.bind(this));
      this.$textarea.on('keyup', this.addMessageEnter.bind(this));
    },
    render: function() {
      this.scrollToBottom();
      if (this.messageToSend.trim() !== '') {
        var template = Handlebars.compile( $("#message-template").html());
        var context = { 
          messageOutput: this.messageToSend
        };

        this.$chatHistoryList.append(template(context));
        this.scrollToBottom();
        this.$textarea.val('');
      }
      
    },
	render2: function() {
      this.scrollToBottom();
      if (this.messageToSend.trim() !== '') {
        
        // responses
        var templateResponse = Handlebars.compile( $("#message-response-template").html());
		
		var progResponse = { 
			response: "Please tell me your programme code before we proceed. eg. hc00, hc05 etc"
        };
		
        var contextResponse = { 
			response: this.getRandomItem(this.messageResponses)
        };
		
		var waitResponse = { 
			response: 'Please wait a moment, we will analyse your query. Highest similarity courses will be shown with a similarity score (Max:5).'
			
        };
        
        setTimeout(function() {
			if(next){
				if(pass){
					this.$chatHistoryList.append(templateResponse(waitResponse));
					this.scrollToBottom();
				}else{
					this.$chatHistoryList.append(templateResponse(contextResponse));
					this.scrollToBottom();
				}
			}else{
				this.$chatHistoryList.append(templateResponse(progResponse));
				this.scrollToBottom();
			}
        }.bind(this), 2000);
        
      }
      
    },
	rerender: function() {
      this.scrollToBottom();
      if (this.messageToSend.trim() !== '') {
        // responses
        var templateResponse = Handlebars.compile( $("#message-response-template").html());
		
        var contextResponse = { 
			response: 'Sorry, I am not understand your answer. Can you explain in more details?'
        };
        
        setTimeout(function() {
			this.$chatHistoryList.append(templateResponse(contextResponse));
			this.scrollToBottom();
			
        }.bind(this), 2000);
      }
    },
	rend: function() {
      this.scrollToBottom();
      if (this.messageToSend.trim() !== '') {
		var template = Handlebars.compile( $("#message-template").html());
        var context = { 
          messageOutput: this.messageToSend
        };

        this.$chatHistoryList.append(template(context));
        this.scrollToBottom();
        this.$textarea.val('');
		
        // responses
        var templateResponse = Handlebars.compile( $("#message-response-template").html());
		
		var redoResponse = { 
			response: "Do you statisfied with the result? Try again? [Y/N]"
		};
        
        setTimeout(function() {
			this.$chatHistoryList.append(templateResponse(redoResponse));
			this.scrollToBottom();
        }.bind(this), 2000);
        
      }
    },
	thank: function() {
      this.scrollToBottom();
      if (this.messageToSend.trim() !== '') {
		var template = Handlebars.compile( $("#message-template").html());
        var context = { 
          messageOutput: this.messageToSend
        };

        this.$chatHistoryList.append(template(context));
        this.scrollToBottom();
        this.$textarea.val('');
		
        // responses
        var templateResponse = Handlebars.compile( $("#message-response-template").html());
		
		var thxResponse = { 
			response: "Thank you, we will end the session here."
		};
        
        setTimeout(function() {
			this.$chatHistoryList.append(templateResponse(thxResponse));
			this.scrollToBottom();
        }.bind(this), 1000);

      }
    },
	end: function() {
      this.scrollToBottom();
      if (this.messageToSend.trim() !== '') {
		var template = Handlebars.compile( $("#message-template").html());
        var context = { 
          messageOutput: this.messageToSend
        };

        this.$chatHistoryList.append(template(context));
        this.scrollToBottom();
        this.$textarea.val('');

      }
    },
	answer: function(result) {
      this.scrollToBottom();
      if (this.messageToSend.trim() !== '') {
        var template = Handlebars.compile( $("#message-template").html());
        
        // responses
        var templateResponse = Handlebars.compile( $("#message-response-template").html());
		var answerResponse = Handlebars.compile( $("#message-answer-template").html());
		
		tex="";
		i=0;
		while(i<result.length){
			if(!(i%2)){
				tex+=result[i]+" ";
			}else{
				tex+=result[i]+", ";
			}
			i++;
		}
		
		
		var contextResponse = { 
			answer:[
			{name: result[1], url: "<?php echo base_url()?>crs_pg/index/"+result[0]+"/"+prog, score: result[2]},
			{name: result[4], url: "<?php echo base_url()?>crs_pg/index/"+result[3]+"/"+prog, score: result[5]},
			{name: result[7], url: "<?php echo base_url()?>crs_pg/index/"+result[6]+"/"+prog, score: result[8]},
			{name: result[10], url: "<?php echo base_url()?>crs_pg/index/"+result[9]+"/"+prog, score: result[11]}
			]
        };
		
		var redoResponse = { 
			response: "Do you statisfied with the result? Try again? [Y/N]"
		};
		
        setTimeout(function() {
			this.$chatHistoryList.append(answerResponse(contextResponse));
			kw=[];
			pass=0;
			result=[];
			asked=[];
			again=false;
			this.$chatHistoryList.append(templateResponse(redoResponse));
			this.scrollToBottom();
			 
        }.bind(this), 5000);
        
      }
    },
    pipeline: function() {
		this.render();
		if(!next){
			this.render2();
		}
		var mesg = this.messageToSend.replace(/ /g, "_").toLowerCase();
		console.log(mesg);
		var self = this;
		var probability = function(n) {
			return !!n && Math.random() <= n;
		};
		if(!next){
			if(mesg.split("_").includes("hc00")){
				prog='hc00';
				next=true;
			}else if(mesg.split("_").includes("hc05")){
				prog='hc05';
				next=true;
			}
		}else{
			$.ajax({
				url: "http://localhost/fyproj/Pipe/pipe",
				type: 'post',
				data: {msg:mesg},
				success: function(data){
					
					var i=0;
					var jsonData = JSON.parse(data);
					if(jsonData=='' && !mesg.split("_").includes("no")){
						if(mesg.split("_").includes("y") || mesg.split("_").includes("yes")){
							self.render2();
						}
						else{
							self.rerender();
						}
					}else{
						self.render2();
						if(!mesg.split("_").includes("y")){
						jsonData.forEach(e => kw.push(e));
						jsonData.forEach(e => i++);
						
						console.log(kw);
						}
					}
					
					if(kw.length>=3){
						var x=kw.length/5;
						pass=probability(x);
						if(pass){
							$.ajax({
								url: "http://localhost/fyproj/Pipe/tfidf",
								type: 'post',
								data: {kw:kw,prog:prog},
								success: function(data){
									//alert('request sent!');
									var jsonData = JSON.parse(data);
									console.log(jsonData);
									if(jsonData){
										result=jsonData;
										
										self.answer(result);
										
									}
								}	
							});
						}
					}
				}
				
			});
		}
		
	},
	
    addMessage: function() {
      this.messageToSend = this.$textarea.val().replace(/\n/g, "");
	  ///////////////////////////////
		
	  if(again){
		this.pipeline();
      }else{
		var msg=this.messageToSend.replace(/ /g, "_").toLowerCase();
		
		if(!terminate){
			if(msg.split("_").includes("yes")||msg.split("_").includes("y")){
				again=true;
				this.pipeline();
			}else if(msg.split("_").includes("no")||msg.split("_").includes("n")){
				again="";
				this.thank();
				terminate=true;
			}
			else{
				this.rend();
			}
		}else{
			this.end();
		}
	  }
    },
    addMessageEnter: function(event) {
        // enter was pressed
        if (event.keyCode === 13) {
			this.addMessage();
        }
    },
    getRandomItem: function(arr) {
	  quest= Math.floor(Math.random()*(arr.length-1));
	  while (asked.includes(quest) && asked.length<arr.length-1){
		quest= Math.floor(Math.random()*(arr.length-1));
	  }
	
	  if (asked.length>=arr.length-1){
	    return arr[arr.length-1];
	  }else{
	    asked.push(quest);
        return arr[quest];
	  }
    }
    
  };
  chat.init();

})();
</script>

</body>
</html>
