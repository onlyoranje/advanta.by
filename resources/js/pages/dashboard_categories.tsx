/*import { PlaceholderPattern } from '@/components/ui/placeholder-pattern';*/
import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/react';
import { useState } from 'react'
const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Категории продукции',
        href: '/dashboard_categories',
    },
];


export default function Dashboard() {
    const [values, setValues] = useState({
        first_name: "",
        last_name: "",
        email: "",
    })
    function handleChange(e) {
        const key = e.target.id;
        const value = e.target.value
        setValues(values => ({
            ...values,
            [key]: value,
        }))
    }
    function handleSubmit(e) {
        e.preventDefault()
        router.post('/dashboard_categories_add', values)
    }
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Dashboard" />
            <div className="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
                <div className="grid auto-rows-min gap-4 md:grid-cols-3"></div>
                <div className="border-sidebar-border/70 dark:border-sidebar-border relative min-h-[100vh] flex-1 overflow-hidden rounded-xl border md:min-h-min">
                    <form onSubmit={handleSubmit}>
                        <label htmlFor="first_name">First name:</label>
                        <input id="first_name" value={values.first_name} onChange={handleChange} />
                        <label htmlFor="last_name">Last name:</label>
                        <input id="last_name" value={values.last_name} onChange={handleChange} />
                        <label htmlFor="email">Email:</label>
                        <input id="email" value={values.email} onChange={handleChange} />
                        <button type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </AppLayout>
    );
};
