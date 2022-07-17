import Swal from "sweetalert2";
import {Inertia} from "@inertiajs/inertia";

export function useFlash() {
    function flash(icon, title,text) {
        Swal.fire({
            icon: icon??'success',
            text: text??"You won't be able to revert this!",
            title: title ??'Your work has been saved',
            showConfirmButton: false,
            timer: 1500
        })
    }

    function askDelete(url) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
           handleDelete(url);
            }
        })
    }

     function handleDelete(url) {
         Inertia.delete(url,{
                onSuccess: () => {
                    flash('error', 'deleted','Your item is gone kaput');
                }
         })
    }


    return {flash, askDelete};
}
