# Donate via Mollie
Start receiving donations for your hard work. And add a Donation button to your website.

The payments are processed by [Mollie](https://www.mollie.com/dashboard/signup/2194481?lang=nl) which accepts major creditcards, paypal, ideal and much more. They handle all PCI compliant stuff, so you only have to [signup](https://www.mollie.com/dashboard/signup/2194481?lang=nl), activate your account, insert the page-snippet anywhere on your page and start receiving donations :)

**Currently this plugin is in Beta** Use it at your own risk :)

### Installation
Installation is pretty simple and straightforward

#### 1. Signup at Mollie
[Signup](https://www.mollie.com/dashboard/signup/2194481) with the folks of Mollie for your free account. They only charge you [a small fee](https://www.mollie.com/en/pricing/) when a successful transaction is made. (like € 0.29 for an iDeal transaction)

#### 2. Install plugin
Duh ;)

#### 3. Set the settings
Provide the correct credentials in the settings tab.  
**API Key**    
The key found in the dashboard of Mollie. It either starts with `live_` or `test_`  
**Redirect URL**:   
This is the url in you domain where the customer is redirected to after completing the payment. Either successfull or un-successfull. Should be a fully qualified URL. The tag [uid] will be replaced with the Unique ID of this donation. You have to produce a cms-page with the correct Component in it (see #6)   
**WebhookURL**:   
The servers of Mollie will asynchronously provide feedback about the transaction to your October installation. So this is a server-2-server contact without any interference of the visitor/donator.
The plugin provides a route for `/donation_webhook` to handle this s2s-contact.    
**Payment description**   
Speaks for itself.

#### 4. Set one or more Goals (optional)
You are able to define Goals for your donations. In the components (#5) you will be able to
select these goals as a destination for your donation.

#### 5. Put a donate button on a page
You can either drop in a component in a CMS page/partial or a page-snippet in a [static page](http://octobercms.com/plugin/rainlab-pages). You can choose between two flavours of buttons:   
1- Simple button with an adjustable fixed amount; or   
2- A radio-list giving amount options for the donation. The options are configurable within the component/pagesnippet by means of a comma separated list.

#### 6. create a donation-status page
After the donator visited his/her payment-website Mollie will redirect him/her to the `redirectUrl`. This is the donation-status page.
You'll have to create such a route yourself in the CMS area with the `:uuid` url parameter. Eg: `/donation-status/:uuid`
On the page, just drop in the *Donation Status*-component to show a 'paid/cancelled/expired'-label

#### 7. Show off the progress off your goals
As you might have created a goal, you certainly want to show the progress to your visitors! We have component for that :) Just drop it in a page and style it.


### Styling
Both the buttons as the donations status don't have any styling applied to them. The buttons and list are encapsulated with a `section.donate-env` to simplify *direct* styling.   
The buttons have a class `.donate-button`.  
The donation Status component is encapsulated with a section with the class `.donate-status-env`.
The status label itself is called '.status-label' and gets a `.status-paid`, `.status-open`, `.status-expired` or `.status-cancelled`

But off course you could always look into the source to see the exact builtup. Or you can even overwrite the whole component by dropping in a partial in: `[theme_name]/partials/[componentName]/default.htm`


### Custom implementations
Under the hood there is a `/do_donate` route which accepts a 'amount'-parameter as a POST request.
If you somehow sent  that parameter to that route, it will automatically redirect you to Mollie. This can come in handy if you would like to extend an existing form or something.
