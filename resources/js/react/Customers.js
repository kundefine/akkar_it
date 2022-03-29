import React, {useEffect, useState} from 'react'
import axios from "axios"
import Swal from 'sweetalert2/dist/sweetalert2.js'

import 'sweetalert2/src/sweetalert2.scss'


const Customers = () => {


    function makeQuery(filter, prefix = '?') {
        let query = '';
        let loop = 0;
        if(filter) {
            for (let key in filter) {
                if(loop == 0) {
                    query += `${prefix}${key}=${filter[key]}`
                } else {
                    query += `&${key}=${filter[key]}`
                }
                loop++;
            }
        }
        return query;
    }

    const [customers, setCustomers] = useState({})
    const [filter, setFilter] = useState({});
    const handleFilter = (e) => {
        setFilter(prevState => {
            let newFilter = {...prevState};
            newFilter[e.target.name] = e.target.value;
            return newFilter;
        })
    }

    const handlePage = (e) => {
        let query = makeQuery(filter, '&');
        axios.get(`${e.target.value}` + query).then(res => {
            setCustomers(res.data);
        })
    }

    let customerData = [];


    useEffect(() => {
        axios.get('http://127.0.0.1:8000/api/import').then(res => {
            setCustomers(res.data);
        })
    }, [])

    useEffect(() => {
        let query = makeQuery(filter);
        axios.get('http://127.0.0.1:8000/api/import' + query).then(res => {
            setCustomers(res.data);
        })

    }, [filter])





    if(customers && customers.customers) {
        customerData = customers.customers.data
    }


    return (

        <div className="row">

            <div className="col-md-12">
                <div className="row mb-2 align-items-center justify-content-between">
                    <div className="col-md-3">
                        <select name="branch" id="branch" className="form-control" onChange={handleFilter} value={filter["branch"] ?? ""}>
                            <option value="">Select One</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                    <div className="col-md-3">
                        <select name="gender" id="gender" className="form-control" onChange={handleFilter} value={filter["gender"] ?? ""}>
                            <option value="">Select One</option>
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                        </select>
                    </div>

                    <div className="col-md-3">
                        <button className="btn btn-sm btn-rounded btn-light" onClick={() => setFilter({})}>Clear Filter</button>
                    </div>
                    <div className="col-md-3">
                        {customers.meta_data ?
                            (
                                <div>
                                    <span className="badge badge-primary mr-1">Total Customer: {customers.meta_data.total_customer}</span>
                                    <span className="badge badge-info mr-1">Total Male Customer: {customers.meta_data.total_male_customer}</span>
                                    <span className="badge badge-success mr-1">Total Female Customer: {customers.meta_data.total_female_customer}</span>
                                </div>

                            ) : null
                        }

                    </div>
                </div>
            </div>





            <div className="col-md-12">
                {
                    customers && customers.customers ? (
                        <div className="d-flex justify-content-between align-items-center mt-5 mb-1">

                            {customers.customers.prev_page_url ? <button className="btn btn-rounded btn-success mr-1" onClick={handlePage} value={customers.customers.prev_page_url}>prev page</button> : null}
                            Current Page: {customers.customers.current_page}
                            {customers.customers.next_page_url? <button className="btn btn-rounded btn-success mr-1" onClick={handlePage} value={customers.customers.next_page_url}>next page</button> : null}
                        </div>
                    ) : null
                }


                <table className="table table-bordered dataTable">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>branch_id</th>
                        <th>first_name</th>
                        <th>last_name</th>
                        <th>email</th>
                        <th>phone</th>
                        <th>gender</th>
                    </tr>
                    </thead>
                    <tbody>

                    {customerData.map(customer => (
                        <tr key={customer.id}>
                            <td>{customer.id}</td>
                            <td>{customer.branch_id}</td>
                            <td>{customer.first_name}</td>
                            <td>{customer.last_name}</td>
                            <td>{customer.email}</td>
                            <td>{customer.phone}</td>
                            <td>{customer.gender}</td>
                        </tr>
                    ))}


                    </tbody>
                </table>

            </div>
        </div>



    )
}

export default Customers;
