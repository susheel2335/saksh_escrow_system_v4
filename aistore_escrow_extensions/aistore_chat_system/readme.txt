=== Aistore Chat System ===
Contributors: susheelhbti
Tags: Escrow System 
License: GPLv2 or later
Requires at least:  5.6
Tested up to: 5.8.3
Stable tag: 2.1


Aistore Chat System is a plateform allow parties to complete safe payments.


== Description ==

1   Chat System

This involve in two steps in first step it ask to provide contract title , 
escrow amount and email ID of your partner once submit it will take you another page and ask to upload any document and details about the escrow and concerned terms and conditions. In second step user can submit one document but in the escrow details page user can submit many documents.

After creating escrow it will take user to details page where user can submit more informtion about escrow and documents as much he want. 

When user create escrow it ask to submit the email of partner and when submit email it send email to the partner with details of the escrow and ask user to create account [ or login] and then the partner visit the escrow details page and ACCEPT escrow.


The partner will have option to ACCEPT/REJECT escrow if accept then the contract will start if not then contract will be cancelled.

In the escrow detail page both partner can upload/download files shared by uploadings. Both partners can also do discussion about the project. It include a wordpress editor so easy to format texts.

2  Dispute Handling:

Some time agreement don't reach either party can start dispute by clicking on a 
give dispute button. When user start dispute the admin will join and discuss
with user and try to short out the problems and then can release or cancel the
payment.



3 File shareing

Both partners can share document each other they can share pdf/zip files vai simple uploads.

4 Discussion boards

It is provide a complete message board where user can post message and check other message.


5 Fee 

Admin can set fee from both parties and earn money.
	

For demo please visit https://escrowsystem.sakshdemo.xyz/
 

Remember 

After enableing the plugin you need to create pages with following shortcodes

[aistore_escrow_system]  This will show form for user to create escrow
 


[escrow_system_part2]  This will show form for user to create escrow form step 2

[aistore_escrow_list] This will lists all escrow created via user or invited by its partner

[aistore_escrow_detail]  Escrow details page where user do trades.

After creating pages please admin and in the form set the pages so that system know which pages is used for which purpose.


== Installation ==

1. Download and extract   to `wp-content/plugins/`
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. "Dashboard"->"Settings"->"Saksh Escrow System"
4. There are some examples on the settings page,  


== Changelog ==

= 1.0.0 =
 

* First release. 

