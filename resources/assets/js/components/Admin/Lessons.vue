<template>
    <md-tabs>
        <md-tab id="movies" md-label="Уроки">


            <div class="container">


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

                    <md-table md-sort="dessert" md-sort-type="desc" @select="onSelect" @sort="onSort">
                        <md-table-header>
                            <md-table-row>
                                <md-table-head md-sort-by="dessert">Активность</md-table-head>
                                <md-table-head md-sort-by="dessert">Позиция</md-table-head>
                                <md-table-head md-sort-by="calories" md-numeric>Название урока</md-table-head>
                                <md-table-head md-sort-by="fat" >Описание урока</md-table-head>
                            </md-table-row>
                        </md-table-header>

                        <md-table-body>
                            <md-table-row v-for="(row, rowIndex) in lessons" :key="rowIndex" :md-item="row"  md-selection>
                                <!--<md-table-cell v-for="(column, columnIndex) in row" :key="columnIndex" :md-numeric="columnIndex !== 'dessert' && columnIndex !== 'comment'" v-if="columnIndex !== 'type'">-->
                                    <!--{{ column }}-->
                                <!--</md-table-cell>-->
                                <md-table-cell>
                                    <md-switch v-model="row.active" id="my-test0" name="my-test0"></md-switch>
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





        </md-tab>
    </md-tabs>
</template>

<script>
    import api from '../../api';
    import _ from 'lodash';

    export default {

        data(){
            return{
                lessons: [
                    {
                        dessert: 'Frozen yogurt',
                        type: 'ice_cream',
                        calories: '159',
                        fat: '6.0',
                        comment: 'Icy'
                    },
                ],

                pagination:{
                    onPage: 3,
                    current: 1,
                    total: '?'
                }
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
            }

        },
        mounted(){
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
