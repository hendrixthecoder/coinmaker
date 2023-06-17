@extends('unauth.layouts.app')
@section('title', 'About')

@section('content')
    <div class="flex flex-col gap-5 my-6">        
        <p class="text-center text-gray-500 text-xl">About Us</p>
        <h2 class="text-black font-black text-4xl text-center">The Better way to invest. The World's Leading Investing Platform.</h2>
    </div>
    
    <div class="mt-6 flex flex-col gap-5 text-gray-500">
        <p>Invest in cryptocurrencies, stocks, ETFs, currencies, indices and commodities on {{ env('APP_NAME') }} disruptive trading platform.</p>
        <p>For more than a decade, Trust Trade Fi has been a leader in the global Fintech revolution. It is the world’s leading investment network, with millions of registered users and an array of innovative trading and investment tools.</p>
        <p>{{ env('APP_NAME') }} was founded in 2007 with the vision of opening up the global markets so that anyone can trade and invest in a simple and transparent way. The Trust Trade Fi Group consists of the Trust Trade Fi platform, our multi-asset trading and investment venue, our crypto wallet and on-chain crypto exchange.</p>
        <p>Trust Trade Fi is a global community of more than 20 million registered users who share their investment strategies. The platform enables users to easily buy, hold and sell assets, monitor their portfolio in real time, and transact whenever they want.</p>
        <p>We provide our users a choice of assets to invest in – from fractional shares, through to commodities, FX, ETFs and crypto – as well as a choice of how to invest. They can trade directly themselves, copy the investment strategy of another more experienced investor, or invest in one of our portfolios.</p>
        <p>{{ env('APP_NAME') }} acts as a bridge between the old world of investing and the new, helping investors navigate and benefit from the transition of assets to the blockchain. Trust Trade Fi is the only place where investors can hold traditional assets such as stocks or commodities alongside ‘new’ assets such as Bitcoin. We believe that in the future all assets will be tokenised, and that crypto is just the first step on this journey.</p>
        <p>As technology has evolved, so has our business. In 2018, we created the infrastructure, in the form of a crypto wallet and on-chain crypto exchange, that supports our commitment to facilitating the evolution of tokenised assets. We believe that leveraging blockchain technology will enable us to become the first truly global service provider, allowing everyone to trade, invest and save.</p>
        <p>{{ env('APP_NAME') }} is regulated in Europe by the Cyprus Securities and Exchange Commission, in the US by the Financial Conduct Authority, and in Australia by the Australian Securities and Investments Commission. With thousands of options for traders and investors. Making sure our clients can operate safely and calmly is a top priority. We are constantly adding new offerings that will give you a better, more diverse investment experience, accessible from anywhere and on any device.</p>
        <p>One of {{ env('APP_NAME') }} main goals is to remove barriers and make online trading and investing more accessible to the everyday user. Whenever people join Trust Trade Fi, we aim to make them feel a part of the platform from the very beginning. Moreover, we realize that many people use multiple platforms to manage their capital online, which is why we are constantly expanding our product offering to eventually include all of your financial needs under one roof.</p>

        <h3>Innovation</h3>
        <p>We take great pride in the fact that we have been around since the earliest days of the Fintech Revolution. Whether by introducing new and exciting ways to trade and invest online or by inventing cutting-edge financial products – we are, and always will be, innovators and disruptors in the Fintech space.</p>

        <h3>Enjoyable</h3>
        <p>We believe that people should be able to trade more than financial assets, like thoughts and feelings. On Trust Trade Fi, our users can interact and gain from each other’s experience. Our platform is intuitive and user-friendly, turning even the most complicated actions, like stock trading, to a simple and interactive experience.</p>

        <h3>Openness</h3>
        <p>Openness and transparency are an integral part of the user experience on Trust Trade Fi. Whether it’s the ability to start a chat with any user on board, our CEO included, or the fact that we don’t charge any hidden fees and make sure our prices are clear and visible, we strive to make sure that our users feel that they have all the information they need to handle their finances on {{ env('APP_NAME') }}.</p>

        <h3>Quality</h3>
        <p>A meticulous thought process behind every decision and a constant striving for perfection, guides Trust Trade Fi to deliver the best possible experience for all of our users. From the moment a person is exposed to our logo, we wish to make sure that he feels our attention to even the minutest details at all times.</p>

    </div>
    
    @endsection
