<template>

    <div>
        <md-table-card>
            <md-toolbar>
                <h1 class="md-title">Курсы</h1>
                <md-button class="md-icon-button md-raised md-primary" @click="$router.push({name: 'course.add'})">
                    <md-icon>add</md-icon>
                </md-button>
            </md-toolbar>

            <md-table  @select="onSelect" @sort="onSort">
                <md-table-header>
                    <md-table-row>
                        <md-table-head>Название курса</md-table-head>
                        <md-table-head>Описание курса</md-table-head>
                        <md-table-head>Начало</md-table-head>
                        <md-table-head>Конец</md-table-head>
                        <md-table-head></md-table-head>
                    </md-table-row>
                </md-table-header>

                <md-table-body>
                    <md-table-row v-for="(row, rowIndex) in lessons" :key="rowIndex" :md-item="row" class="card-panel teal lighten-2">
                        <md-table-cell>
                            <span  @click="$router.push({name: 'course', params: {id: row.id}})">{{ row.title }}</span>
                        </md-table-cell>
                        <md-table-cell>
                            {{ row.description }}
                        </md-table-cell>
                        <md-table-cell>
                            {{ row.date_start }}
                        </md-table-cell>
                        <md-table-cell>
                            {{ row.date_end }}
                        </md-table-cell>
                        <md-table-cell>
                            <md-button class="md-icon-button " @click="openDialog('delete', row.id)">
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
                md-content=""
                md-content-html=""
                md-cancel-text="Отменить"
                @close="onClose"
                ref="delete">
        </md-dialog-confirm>
    </div>

</template>

<script>
    import api from '../../api';
    import _ from 'lodash';
    import adminAPI from '../../admin-api';





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
                deleteId: null
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
                    method: adminAPI.courses.type,
                    url: adminAPI.courses.link,
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
            openDialog(ref, id)
            {
                this.$refs[ref].open();
                this.deleteId = id;
            },
            onClose(type) {

                if( type !== 'ok' ) return;
                api({
                    method: adminAPI.courseDelete.type,
                    url: adminAPI.courseDelete.link + this.deleteId
                })
                    .then(( res )=>{
                        this.loadData();
                    })
                    .catch((res) => {});

            },

            loadData(){
                api({
                    method: adminAPI.courses.type,
                    url: adminAPI.courses.link,
                    data: this.pagination
                })
                    .then(( res )=>{
                        this.lessons = res.data.data;
                        this.pagination.total = res.data.total;
                    })
                    .catch((res) => {});
            }


        },
        mounted(){
            this.loadData();
        }
    }
</script>
