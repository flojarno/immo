
function Register() {


  return (
    <div className="container w-50 p-5">
      <h1>Enregistrez vos infos</h1>
      <form >
          <div className="mb-3">
            <label className="form-label" htmlFor="title">
              <b>title</b>
            </label>
            <input className="form-control" type="text" placeholder="Enter title" name="title"/>
          </div>
          <div className="mb-3">
            <label className="form-label" htmlFor="firstName">
              <b>firstName</b>
            </label>
            <input className="form-control" type="text" placeholder="Enter firstName" name="firstName" require/>
          </div>
          <div className="mb-3">
            <label className="form-label" htmlFor="lastName">
              <b>lastName</b>
            </label>
            <input className="form-control" type="text" placeholder="Enter lastName" name="lastName" require/>
          </div>
          <div className="mb-3">
            <label className="form-label" htmlFor="email">
              <b>Email</b>
            </label>
            <input className="form-control" type="email" placeholder="Enter email" name="email" require/>
          </div>
          <div className="mb-3">
            <label className="form-label" htmlFor="psw">
              <b>Password</b>
            </label>
            <input className="form-control" type="password" placeholder="Enter Password" name="psw" required/>
          </div>
          <div className="mb-3">
            <label className="form-label" htmlFor="address">
              <b>address</b>
            </label>
            <input className="form-control" type="text" placeholder="Enter address" name="address"/>
          </div>
          <div className="mb-3">
            <label className="form-label" htmlFor="additionalAddress">
              <b>additionalAddress</b>
            </label>
            <input className="form-control" type="text" placeholder="Enter additionalAddress" name="additionalAddress"/>
          </div>
          <div className="mb-3">
            <label className="form-label" htmlFor="postalCode">
              <b>postalCode</b>
            </label>
            <input className="form-control" type="text" placeholder="Enter postalCode" name="postalCode"/>
          </div>
          <div className="mb-3">
            <label className="form-label" htmlFor="city">
              <b>city</b>
            </label>
            <input className="form-control" type="text" placeholder="Enter city" name="city"/>
          </div>
          <div className="mb-3">
            <label className="form-label" htmlFor="landlinePhone">
              <b>landlinePhone</b>
            </label>
            <input className="form-control" type="text" placeholder="Enter landlinePhone" name="landlinePhone"/>
          </div>
          <div className="mb-3">
            <label className="form-label" htmlFor="mobilePhone">
              <b>mobilePhone</b>
            </label>
            <input className="form-control" type="text" placeholder="Enter mobilePhone" name="mobilePhone"/>
          </div>
          <button className="btn btn-primary" type="submit">
            Register
          </button>
      </form>
    </div>
  );
}

export default Register;

