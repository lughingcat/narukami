/*==================================
コンテンツメーカーjs
==================================*/

//セレクトボックスの表示切り替え
function cmakerChange(){
	if(document.getElementById('cmaker')){
		id = document.getElementById('cmaker').value;
		if(id == 'ランキング'){
			document.getElementById('cmaker_1item_column_wrap').style.display="";
			document.getElementById('cmaker_slider_wrap').style.display="none";
		}else if(id == 'スライダー'){
			document.getElementById('cmaker_1item_column_wrap').style.display="none";
			document.getElementById('cmaker_slider_wrap').style.display="";
		}
	}
	
	window.onload = cmakerChange;
}

//ボタン式選択項目の入力フォーム非表示
 const closeItem1 = document.getElementById('1columnCloseBtn');
	　　closeItem1.addEventListener('click' , ()=>{
       document.getElementById('cmaker_1item_column_wrap').style.display="none";
      })
 const closeItem2 = document.getElementById('sliderCloseBtn');
	　　closeItem2.addEventListener('click' , ()=>{
       document.getElementById('cmaker_slider_wrap').style.display="none";
      })


//ランキング表示非表示切り替え1
window.addEventListener("load", function(){
	rank1ItemImg = document.getElementById('item_img_url');
	rank1ItemTitle = document.getElementById('rank1-item-title');
	rank1ItemPrice = document.getElementById('rank-item-price');
	rank1ItemUrl = document.getElementById('rank-item-url');
	rank1ItemUrlBtn = document.getElementById('item_img_url_btn');
	rank1ItemUrlClear = document.getElementById('item_img_url_clear');
	rank1Overlay = document.getElementById('rank-notshow-overlay');
	
	var rank1Show = localStorage.getItem('rank1Show');
	if( rank1Show == "true" ){
		rank1ItemImg.disabled = true;
		rank1ItemTitle.disabled = true;
		rank1ItemPrice.disabled = true;
		rank1ItemUrl.disabled = true;
		rank1ItemUrlBtn.disabled = true;
		rank1ItemUrlClear.disabled = true;
		rank1Overlay.style.display = "";
	}else if( rank1Show == "false" ){
		rank1ItemImg.disabled = false;
		rank1ItemTitle.disabled = false;
		rank1ItemPrice.disabled = false;
		rank1ItemUrl.disabled = false;
		rank1ItemUrlBtn.disabled = false;
		rank1ItemUrlClear.disabled = false;
		rank1Overlay.style.display = "none";
	}
});

window.addEventListener("load",function(){
	rankCheck = document.getElementsByName('rank_on');
	rank1ItemImg = document.getElementById('item_img_url');
	rank1ItemTitle = document.getElementById('rank1-item-title');
	rank1ItemPrice = document.getElementById('rank-item-price');
	rank1ItemUrl = document.getElementById('rank-item-url');
	rank1ItemUrlBtn = document.getElementById('item_img_url_btn');
	rank1ItemUrlClear = document.getElementById('item_img_url_clear');
	rank1Overlay = document.getElementById('rank-notshow-overlay');
	rankCheck.forEach(function(e) {
		e.addEventListener("click", function() {           
			const rank1Value = document.querySelector("input:checked[name=rank_on]").value;
			if( rank1Value == "rank_not_show_1"){
				rank1ItemImg.disabled = true;
				rank1ItemTitle.disabled = true;
				rank1ItemPrice.disabled = true;
				rank1ItemUrl.disabled = true;
				rank1ItemUrlBtn.disabled = true;
				rank1ItemUrlClear.disabled = true;
				rank1Overlay.style.display = "";
				localStorage.setItem("rank1Show", "true");
			}else if( rank1Value == "rank_show_1" ){
				rank1ItemImg.disabled = false;
				rank1ItemTitle.disabled = false;
				rank1ItemPrice.disabled = false;
				rank1ItemUrl.disabled = false;
				rank1ItemUrlBtn.disabled = false;
				rank1ItemUrlClear.disabled = false;
				rank1Overlay.style.display = "none";
				localStorage.setItem("rank1Show", "false");
			}
		});
	});
});


//ランキング２
window.addEventListener("load", function(){
	rank2ItemImg = document.getElementById('item_img_url_2');
	rank2ItemTitle = document.getElementById('rank2-item-title');
	rank2ItemPrice = document.getElementById('rank2-item-price');
	rank2ItemUrl = document.getElementById('rank2-item-url');
	rank2ItemUrlBtn = document.getElementById('item_img_url_2_btn');
	rank2ItemUrlClear = document.getElementById('item_img_url_2_clear');
	rank2Overlay = document.getElementById('rank-notshow-overlay-2');
	
	var rank2Show = localStorage.getItem('rank2Show');
	if( rank2Show == "true" ){
		rank2ItemImg.disabled = true;
		rank2ItemTitle.disabled = true;
		rank2ItemPrice.disabled = true;
		rank2ItemUrl.disabled = true;
		rank2ItemUrlBtn.disabled = true;
		rank2ItemUrlClear.disabled = true;
		rank2Overlay.style.display = "";
	}else if( rank2Show == "false" ){
		rank2ItemImg.disabled = false;
		rank2ItemTitle.disabled = false;
		rank2ItemPrice.disabled = false;
		rank2ItemUrl.disabled = false;
		rank2ItemUrlBtn.disabled = false;
		rank2ItemUrlClear.disabled = false;
		rank2Overlay.style.display = "none";
	}
});

window.addEventListener("load",function(){
	rankCheck = document.getElementsByName('rank_on_2');
	rank2ItemImg = document.getElementById('item_img_url_2');
	rank2ItemTitle = document.getElementById('rank2-item-title');
	rank2ItemPrice = document.getElementById('rank2-item-price');
	rank2ItemUrl = document.getElementById('rank2-item-url');
	rank2ItemUrlBtn = document.getElementById('item_img_url_2_btn');
	rank2ItemUrlClear = document.getElementById('item_img_url_2_clear');
	rank2Overlay = document.getElementById('rank-notshow-overlay-2');
	rankCheck.forEach(function(e) {
		e.addEventListener("click", function() {           
			const rank2Value = document.querySelector("input:checked[name=rank_on_2]").value;
			if( rank2Value == "rank_not_show_2"){
				rank2ItemImg.disabled = true;
				rank2ItemTitle.disabled = true;
				rank2ItemPrice.disabled = true;
				rank2ItemUrl.disabled = true;
				rank2ItemUrlBtn.disabled = true;
				rank2ItemUrlClear.disabled = true;
				rank2Overlay.style.display = "";
				localStorage.setItem("rank2Show", "true");
			}else if( rank2Value == "rank_show_2" ){
				rank2ItemImg.disabled = false;
				rank2ItemTitle.disabled = false;
				rank2ItemPrice.disabled = false;
				rank2ItemUrl.disabled = false;
				rank2ItemUrlBtn.disabled = false;
				rank2ItemUrlClear.disabled = false;
				rank2Overlay.style.display = "none";
				localStorage.setItem("rank2Show", "false");
			}
		});
	});
});

//ランキング3
window.addEventListener("load", function(){
	rank3ItemImg = document.getElementById('item_img_url_3');
	rank3ItemTitle = document.getElementById('rank3-item-title');
	rank3ItemPrice = document.getElementById('rank3-item-price');
	rank3ItemUrl = document.getElementById('rank3-item-url');
	rank3ItemUrlBtn = document.getElementById('item_img_url_3_btn');
	rank3ItemUrlClear = document.getElementById('item_img_url_3_clear');
	rank3Overlay = document.getElementById('rank-notshow-overlay-3');
	
	var rank3Show = localStorage.getItem('rank3Show');
	if( rank3Show == "true" ){
		rank3ItemImg.disabled = true;
		rank3ItemTitle.disabled = true;
		rank3ItemPrice.disabled = true;
		rank3ItemUrl.disabled = true;
		rank3ItemUrlBtn.disabled = true;
		rank3ItemUrlClear.disabled = true;
		rank3Overlay.style.display = "";
	}else if( rank3Show == "false" ){
		rank3ItemImg.disabled = false;
		rank3ItemTitle.disabled = false;
		rank3ItemPrice.disabled = false;
		rank3ItemUrl.disabled = false;
		rank3ItemUrlBtn.disabled = false;
		rank3ItemUrlClear.disabled = false;
		rank3Overlay.style.display = "none";
	}
});

window.addEventListener("load",function(){
	rankCheck = document.getElementsByName('rank_on_3');
	rank3ItemImg = document.getElementById('item_img_url_3');
	rank3ItemTitle = document.getElementById('rank3-item-title');
	rank3ItemPrice = document.getElementById('rank3-item-price');
	rank3ItemUrl = document.getElementById('rank3-item-url');
	rank3ItemUrlBtn = document.getElementById('item_img_url_3_btn');
	rank3ItemUrlClear = document.getElementById('item_img_url_3_clear');
	rank3Overlay = document.getElementById('rank-notshow-overlay-3');
	rankCheck.forEach(function(e) {
		e.addEventListener("click", function() {           
			const rank3Value = document.querySelector("input:checked[name=rank_on_3]").value;
			if( rank3Value == "rank_not_show_3"){
				rank3ItemImg.disabled = true;
				rank3ItemTitle.disabled = true;
				rank3ItemPrice.disabled = true;
				rank3ItemUrl.disabled = true;
				rank3ItemUrlBtn.disabled = true;
				rank3ItemUrlClear.disabled = true;
				rank3Overlay.style.display = "";
				localStorage.setItem("rank3Show", "true");
			}else if( rank3Value == "rank_show_3" ){
				rank3ItemImg.disabled = false;
				rank3ItemTitle.disabled = false;
				rank3ItemPrice.disabled = false;
				rank3ItemUrl.disabled = false;
				rank3ItemUrlBtn.disabled = false;
				rank3ItemUrlClear.disabled = false;
				rank3Overlay.style.display = "none";
				localStorage.setItem("rank3Show", "false");
			}
		});
	});
});

//ランキング4
window.addEventListener("load", function(){
	rank4ItemImg = document.getElementById('item_img_url_4');
	rank4ItemTitle = document.getElementById('rank4-item-title');
	rank4ItemPrice = document.getElementById('rank4-item-price');
	rank4ItemUrl = document.getElementById('rank4-item-url');
	rank4ItemUrlBtn = document.getElementById('item_img_url_4_btn');
	rank4ItemUrlClear = document.getElementById('item_img_url_4_clear');
	rank4Overlay = document.getElementById('rank-notshow-overlay-4');
	
	var rank4Show = localStorage.getItem('rank4Show');
	if( rank4Show == "true" ){
		rank4ItemImg.disabled = true;
		rank4ItemTitle.disabled = true;
		rank4ItemPrice.disabled = true;
		rank4ItemUrl.disabled = true;
		rank4ItemUrlBtn.disabled = true;
		rank4ItemUrlClear.disabled = true;
		rank4Overlay.style.display = "";
	}else if( rank4Show == "false" ){
		rank4ItemImg.disabled = false;
		rank4ItemTitle.disabled = false;
		rank4ItemPrice.disabled = false;
		rank4ItemUrl.disabled = false;
		rank4ItemUrlBtn.disabled = false;
		rank4ItemUrlClear.disabled = false;
		rank4Overlay.style.display = "none";
	}
});

window.addEventListener("load",function(){
	rankCheck = document.getElementsByName('rank_on_4');
	rank4ItemImg = document.getElementById('item_img_url_4');
	rank4ItemTitle = document.getElementById('rank4-item-title');
	rank4ItemPrice = document.getElementById('rank4-item-price');
	rank4ItemUrl = document.getElementById('rank4-item-url');
	rank4ItemUrlBtn = document.getElementById('item_img_url_4_btn');
	rank4ItemUrlClear = document.getElementById('item_img_url_4_clear');
	rank4Overlay = document.getElementById('rank-notshow-overlay-4');
	rankCheck.forEach(function(e) {
		e.addEventListener("click", function() {           
			const rank4Value = document.querySelector("input:checked[name=rank_on_4]").value;
			if( rank4Value == "rank_not_show_4"){
				rank4ItemImg.disabled = true;
				rank4ItemTitle.disabled = true;
				rank4ItemPrice.disabled = true;
				rank4ItemUrl.disabled = true;
				rank4ItemUrlBtn.disabled = true;
				rank4ItemUrlClear.disabled = true;
				rank4Overlay.style.display = "";
				localStorage.setItem("rank4Show", "true");
			}else if( rank4Value == "rank_show_4" ){
				rank4ItemImg.disabled = false;
				rank4ItemTitle.disabled = false;
				rank4ItemPrice.disabled = false;
				rank4ItemUrl.disabled = false;
				rank4ItemUrlBtn.disabled = false;
				rank4ItemUrlClear.disabled = false;
				rank4Overlay.style.display = "none";
				localStorage.setItem("rank4Show", "false");
			}
		});
	});
});

//ランキング5
window.addEventListener("load", function(){
	rank5ItemImg = document.getElementById('item_img_url_5');
	rank5ItemTitle = document.getElementById('rank5-item-title');
	rank5ItemPrice = document.getElementById('rank5-item-price');
	rank5ItemUrl = document.getElementById('rank5-item-url');
	rank5ItemUrlBtn = document.getElementById('item_img_url_5_btn');
	rank5ItemUrlClear = document.getElementById('item_img_url_5_clear');
	rank5Overlay = document.getElementById('rank-notshow-overlay-5');
	
	var rank5Show = localStorage.getItem('rank5Show');
	if( rank5Show == "true" ){
		rank5ItemImg.disabled = true;
		rank5ItemTitle.disabled = true;
		rank5ItemPrice.disabled = true;
		rank5ItemUrl.disabled = true;
		rank5ItemUrlBtn.disabled = true;
		rank5ItemUrlClear.disabled = true;
		rank5Overlay.style.display = "";
	}else if( rank5Show == "false" ){
		rank5ItemImg.disabled = false;
		rank5ItemTitle.disabled = false;
		rank5ItemPrice.disabled = false;
		rank5ItemUrl.disabled = false;
		rank5ItemUrlBtn.disabled = false;
		rank5ItemUrlClear.disabled = false;
		rank5Overlay.style.display = "none";
	}
});

window.addEventListener("load",function(){
	rankCheck = document.getElementsByName('rank_on_5');
	rank5ItemImg = document.getElementById('item_img_url_5');
	rank5ItemTitle = document.getElementById('rank5-item-title');
	rank5ItemPrice = document.getElementById('rank5-item-price');
	rank5ItemUrl = document.getElementById('rank5-item-url');
	rank5ItemUrlBtn = document.getElementById('item_img_url_5_btn');
	rank5ItemUrlClear = document.getElementById('item_img_url_5_clear');
	rank5Overlay = document.getElementById('rank-notshow-overlay-5');
	rankCheck.forEach(function(e) {
		e.addEventListener("click", function() {           
			const rank5Value = document.querySelector("input:checked[name=rank_on_5]").value;
			if( rank5Value == "rank_not_show_5"){
				rank5ItemImg.disabled = true;
				rank5ItemTitle.disabled = true;
				rank5ItemPrice.disabled = true;
				rank5ItemUrl.disabled = true;
				rank5ItemUrlBtn.disabled = true;
				rank5ItemUrlClear.disabled = true;
				rank5Overlay.style.display = "";
				localStorage.setItem("rank5Show", "true");
			}else if( rank5Value == "rank_show_5" ){
				rank5ItemImg.disabled = false;
				rank5ItemTitle.disabled = false;
				rank5ItemPrice.disabled = false;
				rank5ItemUrl.disabled = false;
				rank5ItemUrlBtn.disabled = false;
				rank5ItemUrlClear.disabled = false;
				rank5Overlay.style.display = "none";
				localStorage.setItem("rank5Show", "false");
			}
		});
	});
});


//ランキング6
window.addEventListener("load", function(){
	rank6ItemImg = document.getElementById('item_img_url_6');
	rank6ItemTitle = document.getElementById('rank6-item-title');
	rank6ItemPrice = document.getElementById('rank6-item-price');
	rank6ItemUrl = document.getElementById('rank6-item-url');
	rank6ItemUrlBtn = document.getElementById('item_img_url_6_btn');
	rank6ItemUrlClear = document.getElementById('item_img_url_6_clear');
	rank6Overlay = document.getElementById('rank-notshow-overlay-6');
	
	var rank6Show = localStorage.getItem('rank6Show');
	if( rank6Show == "true" ){
		rank6ItemImg.disabled = true;
		rank6ItemTitle.disabled = true;
		rank6ItemPrice.disabled = true;
		rank6ItemUrl.disabled = true;
		rank6ItemUrlBtn.disabled = true;
		rank6ItemUrlClear.disabled = true;
		rank6Overlay.style.display = "";
	}else if( rank6Show == "false" ){
		rank6ItemImg.disabled = false;
		rank6ItemTitle.disabled = false;
		rank6ItemPrice.disabled = false;
		rank6ItemUrl.disabled = false;
		rank6ItemUrlBtn.disabled = false;
		rank6ItemUrlClear.disabled = false;
		rank6Overlay.style.display = "none";
	}
});

window.addEventListener("load",function(){
	rankCheck = document.getElementsByName('rank_on_6');
	rank6ItemImg = document.getElementById('item_img_url_6');
	rank6ItemTitle = document.getElementById('rank6-item-title');
	rank6ItemPrice = document.getElementById('rank6-item-price');
	rank6ItemUrl = document.getElementById('rank6-item-url');
	rank6ItemUrlBtn = document.getElementById('item_img_url_6_btn');
	rank6ItemUrlClear = document.getElementById('item_img_url_6_clear');
	rank6Overlay = document.getElementById('rank-notshow-overlay-6');
	rankCheck.forEach(function(e) {
		e.addEventListener("click", function() {           
			const rank6Value = document.querySelector("input:checked[name=rank_on_6]").value;
			if( rank6Value == "rank_not_show_6"){
				rank6ItemImg.disabled = true;
				rank6ItemTitle.disabled = true;
				rank6ItemPrice.disabled = true;
				rank6ItemUrl.disabled = true;
				rank6ItemUrlBtn.disabled = true;
				rank6ItemUrlClear.disabled = true;
				rank6Overlay.style.display = "";
				localStorage.setItem("rank6Show", "true");
			}else if( rank6Value == "rank_show_6" ){
				rank6ItemImg.disabled = false;
				rank6ItemTitle.disabled = false;
				rank6ItemPrice.disabled = false;
				rank6ItemUrl.disabled = false;
				rank6ItemUrlBtn.disabled = false;
				rank6ItemUrlClear.disabled = false;
				rank6Overlay.style.display = "none";
				localStorage.setItem("rank6Show", "false");
			}
		});
	});
});

/*==================================
メディアアップローダーjs
==================================*/

  

/*==================================
サブフッターCRUDシステムjs
==================================*/


new Vue({
	el:'#subfooters',
	data(){
		return{
			subfooters:[{ text: '', url: ''}],
			active: false,
			addActive: false,
			ismoveOn: false,
			isBgSwich: false,
			subfooterPlhText: 'タイトルを入力してください',
			subfooterPlhUrl: 'URLを入力してください',
		}
	},
	
	
	mounted() { 
    if (localStorage.getItem('subfooters')) { //ストレジのkeyを検索
      try { //json -> stringに変換
        this.subfooters = JSON.parse(localStorage.getItem('subfooters'));
      } catch(e) { //データに問題があった場合に削除
        localStorage.removeItem('subfooters');
      }
    }
	 window.onload = ()=>{
	  var sfNum = this.subfooters.length;
	  if( sfNum <= 5 ){
	   this.addActive = false;
	  }if( sfNum > 5 ){
	   this.addActive = true;
	  }
	}
  },
	
	
	methods:{
		add: function(){
			var sfNum = this.subfooters.length;
			if( sfNum <= 5){
			this.subfooters.push({ text: '', url:'' });
			}
		},
		
		del: function(index){
			this.subfooters.splice(index,1);
		},
		delall : function(){
			this.subfooters.splice(0,this.subfooters.length);
		},
		
		dragList(event, dragIndex){
        event.dataTransfer.effectAllowed = 'move'
        event.dataTransfer.dropEffect = 'move'
        event.dataTransfer.setData('drag-index',dragIndex)
      },
      dropList(event, dropIndex){
        const dragIndex = event.dataTransfer.getData('drag-index')
        const deleteList = this.subfooters.splice(dragIndex, 1);
        this.subfooters.splice(dropIndex, 0, deleteList[0])
      },
	  tempSave(){
	  const parsed = JSON.stringify(this.subfooters);
	  localStorage.setItem('subfooters', parsed);
      alert('保存に成功しました。\n「公開」または「全体をサイトへ反映」をクリックしてサイトへ反映してください。')
    },
	  reactive: function(){
		  this.active = !this.active;
	},
	  moveON: function(){
		  this.ismoveOn = !this.ismoveOn;
	},
	  BgSwich: function(){
		  this.isBgSwich = !this.isBgSwich;
	},
	  changeBtnAdd: function(){
		  var sfNum = this.subfooters.length;
		  if( sfNum <= 5 ){
			  this.addActive = false;
		  }if( sfNum > 5 ){
			  this.addActive = true;
		  }
	}

	}

})
