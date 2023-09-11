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
