<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                    
                        <div id="demo">
                            <form id="search" class="form-inline form-search">
                                <div class="form-group">
                                    <label>Search </label>
                                    <input name="query" class="form-control" v-model="searchQuery">
                                </div>
                                <button type="submit" class="btn btn-primary">Search</button>
                            </form>

                            <grid
                                :data="gridData"
                                :columns="gridColumns"
                                :filter-key="searchQuery"
                                :resource="resource">
                            </grid>
                        </div>
                        <pages 
                            for="section" 
                            :meta="meta" 
                            :links="links"> 
                        </pages>
                                        
                    </div>
                </div>
            </div>
        </div>
     </div>   
</template>

<script>
    import eventHub from '../../events';
    export default {
        data() {
            return {
                sections: [],
                meta: null,
                links: null,
                searchQuery: '',
                gridColumns: ['name', 'class'],
                gridData: [],
                resource: 'sections'
            }
        },
        methods: {
            getRecord (page)
            {
                axios.get('/settings/sections?page=' + page).then((response) => {
                    this.sections = this.gridData = response.data.data;
                    this.meta = response.data.meta;
                    this.links = response.data.links;
                })
            },
        },
        mounted() {
            this.getRecord(1);
            eventHub.$on('section.switch-page', this.getRecord);
        }
    }
</script>
