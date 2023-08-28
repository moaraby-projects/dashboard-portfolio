import React from 'react';

function Home () {
    return (
        <section className='home show-animate' id='home'>
            <div className="home-content">

                <h1>Hi, I'm <span>Mo Araby</span> <span className='animate' style={{ "--i": "2" }} ></span> </h1>
                <div className="text-animate">
                    <h3>"Frontend Developer"</h3>
                    <span className='animate' style={{ "--i": "2.5" }} ></span>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus nesciunt, dignissimos maxime, molestiae accusantium nihil sint officiis deserunt quae aliquam dolore iste ducimus quidem dolorum laudantium ipsa?
                    <span className='animate' style={{ "--i": "3" }} ></span>
                </p>

                <div className="btn-box">
                    <a href="/#" className="btn">Talk To Me</a>
                    <span className='animate' style={{ "--i": "3.5" }} ></span>
                </div>
            </div>

            <div className="home-social">
                <span className='animate' style={{ "--i": "4" }} ></span>
                <a href="/#"><i className='bx bxl-facebook'></i></a>
                <a href="/#"><i className='bx bxl-instagram'></i></a>
                <a href="/#"><i className='bx bxl-linkedin'></i></a>
            </div>

            <span className='animate home-img' style={{ "--i": "5" }} ></span>


        </section>
    );
}

export default Home;