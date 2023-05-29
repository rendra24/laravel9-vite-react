import Pagination from '@/Components/Pagination';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';

export default function List(props) {

    console.log(props.surat)

    const DataSurat=props.surat.data.map(
        (row)=>{
            return(
                <tr className="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td scope="row" className="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{row.nama}</td>
                    <td className="px-6 py-4">{row.keterangan}</td>
                    <td className="px-6 py-4">{row.status}</td>
                    <td className="px-6 py-4 text-right">
                        <a href="#" className="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    </td>
                </tr>
            )
        }
    )
    return (
        <AuthenticatedLayout
            auth={props.auth}
            errors={props.errors}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">List Surat</h2>}
        >
            <Head title="Master Surat" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <div class="p-6 text-gray-900 dark:text-gray-100 text-right">

                    <a href="{route('surat.create')}"><button type="button" class="button-primary">Buat Surat
                            Baru</button></a>


                        <div className="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table className="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead className="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" className="px-6 py-3">
                                Nama Surat
                                </th>
                                <th scope="col" className="px-6 py-3">
                                Keterangan
                                </th>
                                <th scope="col" className="px-6 py-3">
                                Status
                                </th>
                                <th scope="col" className="px-6 py-3">
                                    <span className="sr-only">Edit</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody>

                            {DataSurat}

                            </tbody>
                        </table>
                        <Pagination class="mt-6" links={props.surat.links} />
                        </div>
                    </div>


                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
