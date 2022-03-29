import React from 'react';
import ReactDom from 'react-dom';
import ShortUrl from "./ShortUrl";
import Customers from "./Customers";

let shortUrl = document.getElementById('shortUrl');
let customers = document.getElementById('customers');

if(shortUrl) {
    ReactDom.render(<ShortUrl />, shortUrl);
}

if(customers) {
    ReactDom.render(<Customers />, customers);
}

