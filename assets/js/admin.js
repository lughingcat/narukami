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
	rank1ItemTitle = document.getElementById('rank1-item-title');
	var rank1Show = localStorage.getItem('rank1Show');
	if( rank1Show == "true" ){
		rank1ItemTitle.disabled = true;
	}else if( rank1Show == "false" ){
		rank1ItemTitle.disabled = false;
	}
});

window.addEventListener("load",function(){
	rankCheck = document.getElementsByName('rank_on');
	rank1ItemTitle = document.getElementById('rank1-item-title');
	rankCheck.forEach(function(e) {
		e.addEventListener("click", function() {           
			const rank1Value = document.querySelector("input:checked[name=rank_on]").value;
			if( rank1Value == "rank_not_show_1"){
				rank1ItemTitle.disabled = true;
				localStorage.setItem("rank1Show", "true");
			}else if( rank1Value == "rank_show_1" ){
				rank1ItemTitle.disabled = false;
				localStorage.setItem("rank1Show", "false");
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
