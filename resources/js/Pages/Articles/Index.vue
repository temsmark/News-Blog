<template>
    <Head title="Articles"/>

    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Articles -
                <BreezeNavLink  :href="route('menu.create')"  class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-3 py-1.5 text-center mr-1 mb-1">
                    Add Article
                </BreezeNavLink>
            </h2>
        </div>
    </header>

    <main>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <div class="p-4">
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
                                   placeholder="Search for items" >
                        </div>

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
                                Article title
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Article Summary
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Article Content
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
                            v-for="article in articles.data" :key="article.id">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-table-search-1" type="checkbox"
                                           class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-pre">
                                {{ article.title }}
                            </th>

                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-pre-wrap  ">
                                <!--                                {{ article.summary }}-->
                            </th>

                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-pre-line">
                                <!--                                {{ article.content }}-->
                            </th>
                            <td class="px-6 py-4">
                                {{ article.slug }}
                            </td>
                            <td class="px-6 py-4">
                                {{ article.status }}
                            </td>
                            <td class="px-6 py-4">
                                <!--                                {{ article.icon }}-->
                            </td>
                            <td class="px-6 py-4">
                                <!--                                {{ menu.articles }}-->
                            </td>
                            <td class="px-6 py-4">
                                {{ article.created_at }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="#"
                                   class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            </td>
                        </tr>

                        </tbody>
                    </table>

                    <div class="m-5">
                        <BreezeNavLink v-for="link in articles.links" :href="link.url" v-html="link.label">
                        </BreezeNavLink>
                    </div>

                </div>
            </div>
        </div>
    </main>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";

export default {
    name: "Index",
    layout: BreezeAuthenticatedLayout,
    props: {
        articles: {
            type: Object,
            required: true
        }
    },
}
</script>

<style scoped>

</style>
