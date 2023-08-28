import React from 'react';

function Content () {
    return (
        <section className='contact' id='contact'>

            <h2 className="heading">Contact <span>Me!</span>  <span className='animate scroll' style={{ "--i": "1" }} ></span> </h2>

            <form action="https://kofito.000webhostapp.com/portfolio%20dashboard/components/inser-message.php" method='post'>

                <div className="input-box">

                    <div className="input-field">
                        <input name='name' type="text" placeholder='Full Name' required />
                        <span className="focus"></span>
                        <span className='animate scroll' style={{ "--i": "1.5" }} ></span>
                    </div>

                    <div className="input-field">
                        <input name='email' type="email" placeholder='Email Address' required />
                        <span className="focus"></span>
                        <span className='animate scroll' style={{ "--i": "1.5" }} ></span>
                    </div>

                </div>

                <div className="input-box">

                    <div className="input-field">
                        <input name='number' type="number" placeholder='Mobile Number' required />
                        <span className="focus"></span>
                        <span className='animate scroll' style={{ "--i": "1.5" }} ></span>
                    </div>

                    <div className="input-field">
                        <input name="subject" type="text" placeholder='Subject' required />
                        <span className="focus"></span>
                        <span className='animate scroll' style={{ "--i": "1.5" }} ></span>
                    </div>

                </div>

                <div className="textarea-field">
                    <textarea name="message" id="" cols={30} rows={10} placeholder='Your Message' required></textarea>
                    <span className="focus"></span>
                    <span className='animate scroll' style={{ "--i": "1.5" }} ></span>
                </div>

                <div className="btn-box btns">
                    <button className="btn" type='submit' name='send'>Submit</button>
                    <span className='animate scroll' style={{ "--i": "2" }} ></span>
                </div>
            </form>
        </section>
    );
}

export default Content;