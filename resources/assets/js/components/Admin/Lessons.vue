<template>

   <div>

       <md-table-card>
           <md-toolbar>
               <h1 class="md-title">Уроки</h1>
               <md-button class="md-icon-button">
                   <md-icon>filter_list</md-icon>
               </md-button>

               <md-button class="md-icon-button">
                   <md-icon>search</md-icon>
               </md-button>
           </md-toolbar>

           <md-table  @select="onSelect" @sort="onSort">
               <md-table-header>
                   <md-table-row>
                       <md-table-head >Активность</md-table-head>
                       <md-table-head >Позиция</md-table-head>
                       <md-table-head>Название урока</md-table-head>
                       <md-table-head>Описание урока</md-table-head>
                       <md-table-head ></md-table-head>
                   </md-table-row>
               </md-table-header>

               <md-table-body>
                   <md-table-row v-for="(row, rowIndex) in lessons" :key="rowIndex" :md-item="row"  md-selection>
                       <md-table-cell>
                           <md-switch v-model="row.active" value="false"></md-switch>
                       </md-table-cell>
                       <md-table-cell>
                           {{ row.sort }}
                       </md-table-cell>
                       <md-table-cell>
                           {{ row.title }}
                       </md-table-cell>
                       <md-table-cell>
                           {{ row.description }}
                       </md-table-cell>
                       <md-table-cell>
                           <md-button class="md-icon-button" @click="$router.push({name: 'lesson', params: {id: row.id}})">
                               <md-icon>edit</md-icon>
                           </md-button>
                       </md-table-cell>

                   </md-table-row>
               </md-table-body>
           </md-table>

           <md-table-pagination
                   :md-size="pagination.onPage"
                   :md-total="pagination.total"
                   :md-page="pagination.current"
                   md-label="Всего"
                   md-separator="из"
                   :md-page-options="[3, 10, 25, 50]"
                   @pagination="onPagination"></md-table-pagination>

       </md-table-card>
   </div>

</template>

<script>
    import api from '../../api';
    import _ from 'lodash';


    export default {

        data(){
            return{
                lessons: [],
                pagination:{
                    onPage: 10,
                    current: 1,
                    total: '?'
                },
                editing: {},
                qwe: false
            }
        },

        computed:{
        },

        methods: {
            onSort(e){
                console.log(e)
            },
            onSelect(e){
                console.log(e)
            },
            onPagination(e){
                api({
                    method: 'post',
                    url: '/admin/lessons',
                    data: {
                        onPage: e.size,
                        current: e.page,
                    }
                })
                    .then(( res )=>{
                        this.lessons = res.data.data;
                    })
                    .catch((res) => {});
            },

        },
        created(){
            api({
                method: 'post',
                url: '/admin/lessons',
                data: this.pagination
            })
            .then(( res )=>{
                this.lessons = res.data.data;
                this.pagination.total = res.data.total;

                console.log();
            })
            .catch((res) => {});
        }
    }
</script>
