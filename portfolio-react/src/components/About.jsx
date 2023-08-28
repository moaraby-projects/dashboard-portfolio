import React from 'react';
import about from '../assest/about.png'

import icon1 from '../assest/icon-01.png'
import icon2 from '../assest/icon-02.png'
import icon3 from '../assest/icon-03.png'
import icon4 from '../assest/icon-04.png'
import icon5 from '../assest/icon-05.png'

function About () {
    return (
        <section className='about' id='about'>
            <h2 className='heading'>About <span>Me</span><span className='animate scroll' style={{ "--i": "1" }} ></span></h2>
            <div className="container-about">
                <div className="about-img">
                    <img src={about} alt="" />
                    <span className='circle-spain'></span>
                    <span className='animate scroll' style={{ "--i": "1.5" }} ></span>

                    <div className="about-content">
                        <h3>Frontend Developer
                            <span className='animate scroll' style={{ "--i": "2" }} ></span>
                        </h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. In modi, dignissimos maiores expedita natus delectus, rerum perferendis consequuntur .
                            <span className='animate scroll' style={{ "--i": "2.5" }} ></span>
                        </p>

                        <div className="info-boxs">
                            <span className='animate scroll' style={{ "--i": "2.5" }} ></span>
                            <div className="years-box">
                                <span>01</span>
                                <h2> Years Experience</h2>
                            </div>
                            <div className="projects-box">
                                <span>27+</span>
                                <h2> Projects</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div className="skills-row">
                    <div className="skills-column">
                        <h3 className="title">Coding Skills  <span className='animate scroll' style={{ "--i": "1.5" }} ></span> </h3>

                        <div className="skills-box">
                            <div className="skills-content">
                                <div className="progress">
                                    <h3>Html <span>90%</span></h3>
                                    <div className="bar"><span></span></div>
                                </div>


                                <div className="progress">
                                    <h3>Css <span>85%</span></h3>
                                    <div className="bar"><span></span></div>
                                </div>

                                <div className="progress">
                                    <h3>JavaScript <span>60%</span></h3>
                                    <div className="bar"><span></span></div>
                                </div>

                                <div className="progress">
                                    <h3>React <span>75%</span></h3>
                                    <div className="bar"><span></span></div>
                                </div>
                                <div className="progress">
                                    <h3>Php <span>85%</span></h3>
                                    <div className="bar"><span></span></div>
                                </div>

                            </div>

                            <span className='animate scroll' style={{ "--i": "2" }} ></span>
                        </div>
                    </div>

                    <div className="skills-column two">
                        <h3 className="title">Professional Skills  <span className='animate scroll' style={{ "--i": "3.5" }} ></span></h3>

                        <div className="icons">
                            <div className="box">
                                <img src={icon1} alt="" />
                            </div>
                            <div className="box">
                                <img src={icon2} alt="" />
                            </div>
                            <div className="box">
                                <img src={icon3} alt="" />
                            </div>
                            <div className="box">
                                <img src={icon4} alt="" />
                            </div>
                            <div className="box">
                                <img src={icon5} alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </section>
    );
}

export default About;