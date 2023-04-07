
new Vue({
	el:'#app',
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
      alert('保存に成功しました。\n公開をクリックしてサイトへ反映してください。')
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
