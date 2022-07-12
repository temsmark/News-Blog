<template>
    <Head title="Dashboard"/>

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Menu -
                <BreezeNavLink  :href="route('menu.index')"  class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-3 py-1.5 text-center mr-1 mb-1">
                    &lt; Back
                </BreezeNavLink>
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-3.5 py-2.5">
                    <form @submit.prevent="submit">
                        <div class="grid xl:grid-cols-2 xl:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" v-model="form.name" id="name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
                                <label for="name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name</label>
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500" v-if="errors.name"><span class="font-medium">Oops!</span>
                                    {{ errors.name }}
                                </p>
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" v-model="form.icon" id="icon" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
                                <label for="icon" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Icon</label>
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500" v-if="errors.icon"><span class="font-medium" >Oops!</span>
                                    {{ errors.icon }}
                                </p>
                            </div>
                        </div>
                        <div class="grid xl:grid-cols-4 xl:gap-10">
                            <div class="relative z-0 w-full mb-6 group">
                                <select id="countries" v-model="form.status"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option  v-for="status in statuses" :value="status">{{status}}</option>
                                </select>
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"  v-if="errors.status"><span class="font-medium">Oops!</span>
                                    {{ errors.status }}
                                </p>
                            </div>

                        </div>
                        <button type="submit" :disabled="form.processing" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </form>


                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script setup>
import {useForm} from "@inertiajs/inertia-vue3";

defineProps({
    statuses: Object,
    errors: Object,
})

let form=useForm({
    name: '',
    icon: '',
    status: '',
});

let submit=()=>{
    form.post(route('menu.store'));

}

</script>

<style scoped>

</style>
