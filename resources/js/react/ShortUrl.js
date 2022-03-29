import React, {useEffect, useState} from 'react';
import axios from "axios";
import Swal from 'sweetalert2/dist/sweetalert2.js'

import 'sweetalert2/src/sweetalert2.scss'


const ShortUrl = () => {

    const [url, setUrl] = useState('');
    const [error, setError] = useState(null);
    const [shortUrls, setShortUrls] = useState([]);

    useEffect(() => {
        axios.get('/dashboard/url').then(res => {
            setShortUrls(res.data)
        })
    }, [])

    const submitHandler = (e) => {
        e.preventDefault();
        axios.post('/dashboard/url/create', {
            url: url
        }).then(res => {

            setShortUrls(prevState => {
                let newState = [res.data, ...prevState];
                return newState;
            })

            Swal.fire({
                title: 'success!',
                text: 'Short Url has been created successfully',
                icon: 'success',
            })
        }).catch(err => {
            let errors = err.response.data.errors;
            for(let key in errors ) {
                let message = '';
                errors[key].map(err => {
                    message += `${err} `;
                });
                setError({msg: message});
            }
        });
    }

    const deleteHandler = (e, id) => {
        axios.delete(`/dashboard/url/delete/${id}`).then(res => {
            if(res.data === 1) {
                setShortUrls(prevState => {
                    let newState = [...prevState];
                    return newState.filter(url => url.id !== id)
                })
            }
        })
    }
    let  errorClassName = 'form-control';



    return (

        <div className="row flex-grow">
            <div className="col-4 grid-margin">
                <div className="card">
                    <div className="card-body">
                        <div className="d-flex justify-content-between align-items-baseline">
                            <h6 className="card-title mb-0">Generate Short Url</h6>
                        </div>


                        <div className="row mt-3">
                            <div className="col-12">
                                <form method="post" onSubmit={submitHandler}>
                                    <div className="form-group">
                                        <label htmlFor="url">Url:</label>
                                        <input type="text" className={errorClassName} name="url" placeholder="Ex: www.google.com" value={url} onChange={(e) => setUrl(e.target.value)}/>
                                        <p className="text-danger">{error ? error.msg : null}</p>
                                    </div>

                                    <div className="form-group">
                                        <button className="btn btn-primary">Generate</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <div className="col-8 stretch-card">
                <div className="card">
                    <div className="card-body">
                        <div className="d-flex justify-content-between align-items-baseline mb-2">
                            <h6 className="card-title mb-0">Projects</h6>
                        </div>
                        <div className="table-responsive">
                            <table className="table table-hover mb-0">
                                <thead>
                                <tr>
                                    <th className="pt-0">#</th>
                                    <th className="pt-0">Id</th>
                                    <th className="pt-0">Url</th>
                                    <th className="pt-0">Short Url</th>
                                    <th className="pt-0">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                {shortUrls.map((short_url, index) => (
                                    <tr key={short_url.id}>
                                        <td>{index}</td>
                                        <td>{short_url.id}</td>
                                        <td>{short_url.url}</td>
                                        <td>{short_url.s_url}</td>
                                        <td><button className="btn btn-danger" onClick={(e) => {deleteHandler(e, short_url.id)}}>delete</button></td>
                                    </tr>
                                ))}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>


    )
}

export default ShortUrl;
