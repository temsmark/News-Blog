<template>
    <Head :title="article.title"/>
    <header class="bg-white shadow">

        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ article.title }}
            </h2>
        </div>


    </header>
    <main>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
                <div class="py-2">
                    <img :src="article.featured_image" loading="lazy" class="mx-auto h-300 " alt="">

                </div>

                <div class="bg-gray-300/50 px-5 rounded  py-5 mb-4">
                    <p>
                        {{ article.summary }}
                    </p>
                </div>
                <p class="justify-content-start px-6 mb-2">
                    {{ article.content }}
                </p>

                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <span href="#"
                                  class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                                {{ article.author }}
                            </span>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                          clip-rule="evenodd"></path>
                                </svg>
                                <span href="#"
                                      class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                                {{ article.menu }}
                            </span>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                          clip-rule="evenodd"></path>
                                </svg>
                                <span href="#"
                                      class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                                {{ article.created_at }}
                            </span>
                            </div>
                        </li>

                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                          clip-rule="evenodd"></path>
                                </svg>
                                <span href="#"
                                      class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
 <BreezeNavLink :href="route('article.index')"
                class="font-medium ml-3 text-blue-600 dark:text-blue-500 hover:underline">
                                    <fa icon="fa fa-angle-left"/>

 </BreezeNavLink>
                                </span>
                            </div>
                        </li>
                    </ol>
                </nav>


            </div>
        </div>

    </main>
</template>


<script >
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
export default {
    name: "Show.vue",
    layout: BreezeAuthenticatedLayout,
    props: {
        article: {
            type: Object,
            required: true
        }
    },
}
</script>

<style scoped>

</style>
