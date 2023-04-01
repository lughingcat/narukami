
new Vue({
	el:'#app',
	data(){
		return{
			subfooters:[{ text: '', url: ''}],
			active: false,
			ismoveOn: false,
			isBgSwich: false,
			items: [{ id: 1 }, { id: 2 } ]
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
			this.subfooters.push({ text: 'aaa', url:'ddd' })
		},
		
		del: function(index){
			this.subfooters.splice(index,1);
		},
		delall : function(index){
			this.subfooters.splice(index);
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
      console.log('うまく保存できましたか？');
    },
	  reactive: function(){
		  this.active = !this.active;
	},
	  moveON: function(){
		  this.ismoveOn = !this.ismoveOn;
	},
	  BgSwich: function(){
		  this.isBgSwich = !this.isBgSwich
	},
	  addform: function () {
      this.items.push({
        id: Math.random()
      })
    }
	}
})


new Vue({
  el: "#app2",
  methods: {
    add: function () {
      this.items.push({
        id: Math.random()
      })
    }
  },
  data: function () {
    return {
      items: [
        {
          id: 1
        },
        {
          id: 2
        }
      ]
    }
  }
})