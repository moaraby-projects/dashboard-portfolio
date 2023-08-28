import React, { useEffect, useState } from 'react';
import { useDispatch, useSelector } from 'react-redux';
import { fetchProducts } from '../rtk/slices/products-slice';
import Aos from 'aos';

function Projects () {
    Aos.init();
    const dispatch = useDispatch();
    const products = useSelector((state) => state.products)
    const [filter, setFilter] = useState(products);

    useEffect(() => {
        dispatch(fetchProducts())

    }, [])
    console.log(products);

    const filterProduct = (cat) => {
        const updateData = products.filter((x) => x.category === cat);
        setFilter(updateData)
    }

    const LoaderProducts = () => {
        return (
            <>

                {products.map((project) => {
                    return (
                        <div className="box" key={project.id} data-title={project.title} data-aos="fade-right"
                            data-aos-offset="500"
                            data-aos-easing="ease-in-sine" >
                            <img src={`https://kofito.000webhostapp.com/portfolio%20dashboard/asset/imgs/${project.image}`} alt="" />
                            <div className="link-site">
                                <a target='_blank' href={project.url}><i className='bx bx-planet bx-tada' ></i></a>
                            </div>
                        </div>
                    )
                })}
            </>
        )
    }
    const ShowProducts = () => {
        return (
            <>

                {filter.map((project) => {
                    return (
                        <div className="box" key={project.id} data-title={project.title} data-aos="fade-left"
                            data-aos-anchor="#example-anchor"
                            data-aos-offset="500"
                            data-aos-duration="500">
                            <img src={`https://kofito.000webhostapp.com/portfolio%20dashboard/asset/imgs/${project.image}`} alt="" />
                            <div className="link-site">
                                <a target='_blank' href={project.url}><i className='bx bx-planet bx-tada' ></i></a>
                            </div>
                        </div>
                    )
                })}
            </>
        )
    }


    return (
        <section className='projects' id='projects'>
            <h2 className="heading">Projects <span>Me</span></h2>
            <div className="btn-box">
                <button className='btn' onClick={() => setFilter(products)}>All</button>
                <button className='btn ' onClick={() => filterProduct("portfolio")}>Portfolio</button>
                <button className='btn white-space' onClick={() => filterProduct("e commerce")}>E-commerce</button>
            </div>

            <div className="box-projects">
                {filter.length === 0 ? <LoaderProducts /> : <ShowProducts />}
            </div>
        </section>
    );
}

export default Projects;