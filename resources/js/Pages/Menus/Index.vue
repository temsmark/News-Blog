<template>
    <Head title="Menus"/>

    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Menus
        </h2>
        </div>
    </header>

    <main>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                  <div class=" p-4 flex justify-between">
                        <label for="table-search" class="sr-only">Search</label>
                        <div class="relative mt-1">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                     viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                          clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input type="text" id="table-search"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   placeholder="Search for items" v-model="phrase" >
                        </div>

                      <BreezeNavLink  :href="route('menu.create')"  class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-2 py-1.5 text-center mr-1 mb-1">
                          Add Menu
                      </BreezeNavLink>
                  </div>

                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-all-search" type="checkbox"
                                           class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Menu name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Slug
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Icon
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Articles
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Created
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                            v-for="menu in menus" :key="menu.id">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-table-search-1" type="checkbox"
                                           class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{ menu.name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ menu.slug }}
                            </td>
                            <td class="px-6 py-4">
                                {{ menu.status }}
                            </td>
                            <td class="px-6 py-4">
                                <fa :icon="menu.icon"  class="fa fa-coffee" />
                            </td>
                            <td class="px-6 py-4">
                                {{ menu.articles }}
                            </td>
                            <td class="px-6 py-4">
                                {{ menu.created_at }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="#"
                                   class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                <a href="#"
                                   @click="askDelete(route('menu.destroy', {menu: menu}))"
                                   class="font-medium ml-3 text-red-600 dark:text-red-500">
                                    <fa icon="fa fa-trash"/>


                                </a>

                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </main>
</template>

<script>
import {Inertia} from "@inertiajs/inertia";
import {InertiaProgress} from "@inertiajs/progress";
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import _ from "lodash";
import {ref, watch} from "vue";
import {useFlash} from "@/Composables/useFlash";

InertiaProgress.init({
    showSpinner: true,
});
export default {
    name: "Index",

    layout: BreezeAuthenticatedLayout,
    props: {
        menus: Object
    },
    setup(){
        let phrase=ref('');
        let {askDelete}=useFlash();

        watch(phrase,_.throttle(()=>{
                Inertia.get("/menu", { phrase: phrase.value }, {preserveState: true, replace:true});
            },300)
        );


        return{
            phrase,
            askDelete
        }

    },

}
</script>

<style scoped>

</style>
