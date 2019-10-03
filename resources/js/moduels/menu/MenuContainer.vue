<template>
    <div class="wrapper menu_container">
        <div class="row">
            
            <div class="col-md-8">
                <card-component>
                    <template slot="title">My Menu Items</template>
                    <template slot="main">
                        <div class="section">
                            <multiselect v-model="menu" :options="categories"></multiselect>
                        </div>
                        
                        <menu-groups :items="currentMenuItems"></menu-groups>
                    </template>
                </card-component>
            </div>
            
            <div class="col-md-4">
                <card-component>
                    <template slot="title">Add Menu Items</template>
                    <template slot="main">
                        <menu-add-form :categories="categories" :resto-id="restoId" v-on:newMenuItemAdded="handleNewMenuItem"></menu-add-form>
                    </template>
                </card-component>
            </div>
            
        </div>
    </div>
</template>

<script>
    import _ from 'lodash';
    import Multiselect from 'vue-multiselect';
    import MenuGroups from './MenuGroups.vue';
    import MenuAddForm from './MenuAddForm.vue';
    export default {
        name: "menu-container",
        
        data(){
            return{
                categories: [],
                menu: '',
                localItem: ''
            }
        },
        
        props: ['items','restoId'],
        
        components: {
            Multiselect,
            MenuGroups,
            MenuAddForm
        },
        
        created(){
            _.forEach(this.items, (item, key) => {
                this.categories.push(key);
            });
            
            this.menu = this.categories[0];
            this.localItem = this.items;
        },
        
        computed: {
            currentMenuItems(){
                return this.localItem[this.menu];
            }
        },
        
        methods: {
            handleNewMenuItem(item, category){
                console.log('item', item);
                this.localItem[category].unshift(item);
            }
        }
    }
</script>

<style scoped>

</style>