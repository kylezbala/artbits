@extends('layout.master')
@section('content')
    <br>
    <form action="{{URL::to('/register')}}" method="post">

        @csrf
        <br>
        <br>
        <br>
        <div class="main main-raised">
            <div class="container-fluid">


                {{--VALIDATION DISPLAY--}}
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            {{$error}}<br>
                        @endforeach
                    </div>

                @endif
                {{--VALIDATION DISPLAY--}}
                <div class="row ">
                    <div class="col-6">
                        <fieldset>
                            <legend>Basic Information</legend>
                            Last Name
                            <input type="text" name="Lastname" class="form-control"><br>

                            First Name
                            <input type="text" name="Firstname" class="form-control"><br>

                            Middle Name
                            <input type="text" name="Middlename" class="form-control"><br>

                            Username
                            <input type="text" name="Username" class="form-control"><br>

                            Password
                            <input type="password" name="Password" class="form-control"><br>


                            Gender
                            <select
                                    name="Gender" class="form-control">
                                <option value="1">Male</option>
                                <option value="0">Female</option>
                            </select><br>


                            <div class="form-group">
                                <label class="label-control">Birth Date</label>
                                <input type="date" name="Birthdate" class="form-control" value="10/05/2016"/>
                            </div>
                        </fieldset>

                    </div>
                    <div class="col-6">
                        <fieldset>
                            <legend>Address</legend>
                            Street<input type="text" name="street" class="form-control"><br>
                            Barangay<input type="text" name="barangay" class="form-control"><br>
                            Landmark<input type="text" name="landmark" class="form-control"><br>
                            City<input type="text" name="city" class="form-control"><br>
                            Province<input type="text" name="province" class="form-control"><br>
                            Region<input type="text" name="name" class="form-control"><br>
                            ZIP Code<input type="text" name="zip" class="form-control"><br>

                        </fieldset>
                    </div>

                </div>
                <div class="row">
                    <div class="col">
                        <fieldset>
                            <legend>Contact Information</legend>
                        Mobile<input type="text" name="MobileNo" class="form-control"><br>

                        Email<input type="text" name="Email" class="form-control"><br>


                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                        </fieldset>
                    </div>
                </div>


                <input type="Submit" name="submit" value="Create Account" class="col-lg-offset-5 btn btn-success" ;/>
                <a href="{{url('/home')}}" class="btn btn-danger">Cancel</a>
                <br>
                <a class="nav-link" data-toggle="modal" data-target="#exampleModalLong">
                    VIEW TERMS AND CONDITIONS
                </a>
                <div class="togglebutton">
                    <label>
                        <input name="Terms&Conditions" type="checkbox">
                        <span class="toggle"></span>
                        I agree to the terms and conditions.
                    </label>
                    <br>
                </div>
                <div class="g-recaptcha" data-sitekey="6LeidXkUAAAAACk6W2J87G4yLAFXL_CbLf7uSNfL"></div>

            </div>

        </div>

    </form>


    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Terms and Conditions</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Welcome to ArtBits
                    These terms and conditions outline the rules and regulations for the use of ArtBits's Website.
                    ArtBits is located at:
                    ManilaNational Capital Region - Philippines

                    By accessing this website we assume you accept these terms and conditions in full. Do not continue
                    to use ArtBits's website if you do not accept all of the terms and conditions stated on this page.
                    The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer
                    Notice and any or all Agreements: “Client”, “You” and “Your” refers to you, the person accessing
                    this website and accepting the Company’s terms and conditions. “The Company”, “Ourselves”, “We”,
                    “Our” and “Us”, refers to our Company. “Party”, “Parties”, or “Us”, refers to both the Client and
                    ourselves, or either the Client or ourselves. All terms refer to the offer, acceptance and
                    consideration of payment necessary to undertake the process of our assistance to the Client in the
                    most appropriate manner, whether by formal meetings of a fixed duration, or any other means, for the
                    express purpose of meeting the Client’s needs in respect of provision of the Company’s stated
                    services/products, in accordance with and subject to, prevailing law of Philippines. Any use of the
                    above terminology or other words in the singular, plural, capitalization and/or he/she or they, are
                    taken as interchangeable and therefore as referring to same license unless otherwise stated, ArtBits
                    and/or it’s licensors own the intellectual property rights for all material on ArtBits. All
                    intellectual property rights are reserved. You may view and/or print pages from https://artbits.com
                    for your own personal use subject to restrictions set in these terms and conditions.
                    You must not:
                    Republish material from https://artbits.com
                    Sell, rent or sub-license material from https://artbits.com
                    Reproduce, duplicate or copy material from https://artbits.com
                    Redistribute content from ArtBits (unless content is specifically made for redistribution).
                    Hyperlinking to our Content
                    The following organizations may link to our Web site without prior written approval:
                    Government agencies; Search engines; News organizations; Online directory distributors when they
                    list us in the directory may link to our Web site in the same manner as they hyperlink to the Web
                    sites of other listed businesses; and Systemwide Accredited Businesses except soliciting non-profit
                    organizations, charity shopping malls, and charity fundraising groups which may not hyperlink to our
                    Web site.
                    These organizations may link to our home page, to publications or to other Web site information so
                    long as the link: (a) is not in any way misleading; (b) does not falsely imply sponsorship,
                    endorsement or approval of the linking party and its products or services; and (c) fits within the
                    context of the linking party's site.
                    We may consider and approve in our sole discretion other link requests from the following types of
                    organizations: commonly-known consumer and/or business information sources such as Chambers of
                    Commerce, American Automobile Association, AARP and Consumers Union; dot.com community sites;
                    associations or other groups representing charities, including charity giving sites, online
                    directory distributors; Internet portals; accounting, law and consulting firms whose primary clients
                    are businesses; and educational institutions and trade associations.

                    We will approve link requests from these organizations if we determine that: (a) the link would not
                    reflect unfavorably on us or our accredited businesses (for example, trade associations or other
                    organizations representing inherently suspect types of business, such as work-at-home opportunities,
                    shall not be allowed to link); (b)the organization does not have an unsatisfactory record with us;
                    (c) the benefit to us from the visibility associated with the hyperlink outweighs the absence of ;
                    and (d) where the link is in the context of general resource information or is otherwise consistent
                    with editorial content in a newsletter or similar product furthering the mission of the
                    organization.

                    These organizations may link to our home page, to publications or to other Web site information so
                    long as the link: (a) is not in any way misleading; (b) does not falsely imply sponsorship,
                    endorsement or approval of the linking party and it products or services; and (c) fits within the
                    context of the linking party's site.

                    If you are among the organizations listed in paragraph 2 above and are interested in linking to our
                    website, you must notify us by sending an e-mail to artbits@gmail.com. Please include your name,
                    your organization name, contact information (such as a phone number and/or e-mail address) as well
                    as the URL of your site, a list of any URLs from which you intend to link to our Web site, and a
                    list of the URL(s) on our site to which you would like to link. Allow 2-3 weeks for a response.
                    Approved organizations may hyperlink to our Web site as follows:
                    By use of our corporate name; or
                    By use of the uniform resource locator (Web address) being linked to; or
                    By use of any other description of our Web site or material being linked to that makes sense within
                    the context and format of content on the linking party's site.
                    No use of ArtBits’s logo or other artwork will be allowed for linking absent a trademark license
                    agreement.


                    Reservation of Rights
                    We reserve the right at any time and in its sole discretion to request that you remove all links or
                    any particular link to our Web site. You agree to immediately remove all links to our Web site upon
                    such request. We also reserve the right to amend these terms and conditions and its linking policy
                    at anytime. By continuing to link to our Web site, you agree to be bound to and abide by these
                    linking terms and conditions.
                    Content Liability
                    We shall have no responsibility or liability for any content appearing on your Web site. You agree
                    to indemnify and defend us against all claims arising out of or based upon your Website. No link(s)
                    may appear on any page on your Web site or within any context containing content or materials that
                    may be interpreted as libelous, obscene or criminal, or which infringes, otherwise violates, or
                    advocates the infringement or other violation of, any third party rights.
                    Disclaimer
                    To the maximum extent permitted by applicable law, we exclude all representations, warranties and
                    conditions relating to our website and the use of this website (including, without limitation, any
                    warranties implied by law in respect of satisfactory quality, fitness for purpose and/or the use of
                    reasonable care and skill). Nothing in this disclaimer will:
                    limit or exclude our or your liability for death or personal injury resulting from negligence;
                    limit or exclude our or your liability for fraud or fraudulent misrepresentation;
                    limit any of our or your liabilities in any way that is not permitted under applicable law; or
                    exclude any of our or your liabilities that may not be excluded under applicable law.

                    The limitations and exclusions of liability set out in this Section and elsewhere in this
                    disclaimer:
                    (a) are subject to the preceding paragraph; and (b) govern all liabilities arising under the
                    disclaimer or in relation to the subject matter of this disclaimer, including liabilities arising in
                    contract, in tort (including negligence) and for breach of statutory duty. To the extent that the
                    website and the information and services on the website are provided free of charge, we will not be
                    liable for any loss or damage of any nature.

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

