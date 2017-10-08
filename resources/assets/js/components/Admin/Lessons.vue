<template>

   <div>
       <md-table-card>
           <md-toolbar>
               <h1 class="md-title">Уроки</h1>
               <md-button class="md-icon-button md-raised md-primary" @click="$router.push({name: 'lesson.add'})">
                   <md-icon>add</md-icon>
               </md-button>
           </md-toolbar>

           <md-table  @select="onSelect" @sort="onSort">
               <md-table-header>
                   <md-table-row>
                       <md-table-head >Активность</md-table-head>
                       <md-table-head >Позиция</md-table-head>
                       <md-table-head>Название урока</md-table-head>
                       <md-table-head>Описание урока</md-table-head>
                       <md-table-head></md-table-head>
                   </md-table-row>
               </md-table-header>

               <md-table-body>
                   <md-table-row v-for="(row, rowIndex) in lessons" :key="rowIndex" :md-item="row">
                       <md-table-cell>
                           <md-switch v-model="row.active" value="false"></md-switch>
                       </md-table-cell>
                       <md-table-cell>
                           {{ row.sort }}
                       </md-table-cell>
                       <md-table-cell>
                           <span  @click="$router.push({name: 'lesson', params: {id: row.id}})">{{ row.title }}</span>
                       </md-table-cell>
                       <md-table-cell>
                           {{ row.description }}
                       </md-table-cell>
                       <md-table-cell>
                           <md-button class="md-icon-button " @click="openDialog('delete')">
                               <md-icon>delete</md-icon>
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

                   @pagination="onPagination"></md-table-pagination>

       </md-table-card>

       <md-dialog-confirm
               md-title="Удалить?"
               md-ok-text="Удалить"
               md-cancel-text="Отменить"
               @open="onOpen"
               @close="onClose"
               ref="delete">
       </md-dialog-confirm>
   </div>

</template>

<script>
    import api from '../../api';
    import _ from 'lodash';
    import adminAPI from '../../admin-api';

    import { mapState } from 'vuex'


    export default {

        data(){
            return{
                lessons: [],
                pagination:{
                    onPage: 20,
                    current: 1,
                    total: '?'
                },
                editing: {},
                qwe: false
            }
        },

        computed: {

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
                    method: adminAPI.lessons.type,
                    url: adminAPI.lessons.link,
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
            openDialog(ref)
            {
                this.$refs[ref].open();
            }

        },
        mounted(){
            api({
                method: adminAPI.lessons.type,
                url: adminAPI.lessons.link,
                data: this.pagination
            })
            .then(( res )=>{
                this.lessons = res.data.data;
                this.pagination.total = res.data.total;
            })
            .catch((res) => {});
        }
    }
</script>
